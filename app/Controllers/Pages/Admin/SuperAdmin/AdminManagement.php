<?php

namespace App\Controllers\Pages\Admin\SuperAdmin;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\LoginModel;
use Myth\Auth\Models\PermissionModel;

class AdminManagement extends BaseController
{
  protected $db;
  protected $userModel;
  protected $groupModel;
  protected $loginModel;
  protected $permissionModel;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->userModel = new UserModel();
    $this->groupModel = new GroupModel();
    $this->loginModel = new LoginModel();
    $this->permissionModel = new PermissionModel();
  }

  public function index(): string
  {
    $currentPage = $this->request->getVar('page_admin_management') ? $this->request->getVar('page_admin_management') : 1;
    $roleList = $this->groupModel->select('*, name as role')->findAll();
    $dataCountOnePage = 10;

    $loggedUser = user();
    $keyword = $this->request->getVar('keyword');
    $role = $this->request->getVar('role');

    if ($keyword) $results = $this->userModel
      ->select('users.id as userid, username, email, fullname, user_image, name, users.created_at, users.updated_at, deleted_at')
      ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
      ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
      ->where('users.deleted_at', null)
      ->where('users.id !=', $loggedUser->id) // Filter user yang sedang login
      ->groupStart()
      ->like('username', $keyword)
      ->orLike('email', $keyword)
      ->groupEnd()
      ->orderBy('users.id', 'DESC')
      ->paginate($dataCountOnePage, 'users');
    else {
      $results = $this->userModel
        ->select('users.id as userid, username, email, fullname, user_image, auth_groups_users.group_id as roleid, auth_groups.name as role, users.created_at, users.updated_at, deleted_at')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->where('users.deleted_at', null)
        ->where('users.id !=', $loggedUser->id); // Filter user yang sedang login

      if ($role) $results = $results->where('auth_groups.name', $role);
      $results = $results
        ->orderBy('users.id', 'DESC')
        ->paginate($dataCountOnePage, 'users');
    }

    $data = [
      'title' => 'Admin Management',
      'request' => $this->request,
      'pager' => $this->userModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'roleList' => $roleList,
      'results' =>  $results,
    ];
    return view('Pages/Admin/Pages/SuperAdmin/AdminManagement/Index', $data);
  }

  public function indexUpdate($id)
  {

    $validationRule = [
      'username_edit' => [
        'label' => 'Username',
        'rules' => 'required',
      ],
      'role_edit' => [
        'label' => 'Role',
        'rules' => 'required',
      ],
    ];

    if (!$this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataAdminManagement' . $id, true);
    }

    $dataToEdit = $this->request->getVar();

    // Update username in users table
    $this->userModel->set('username', $dataToEdit['username_edit']);
    $this->userModel->where('id', $id);
    $userUpdate = $this->userModel->update();

    // Update group_id in pivot table (auth_groups_users)
    $groupUpdate = $this->db->table('auth_groups_users')
      ->where('user_id', $id)
      ->set('group_id', $dataToEdit['role_edit'])
      ->set('updated_at', Time::now())
      ->update();

    if ($userUpdate || $groupUpdate) {
      cache()->clean(); // hapus cache
      $message = 'Data updated!';
    } else {
      $message = 'Updating Data Failed!';
    }

    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/admin-management');
  }

  public function indexDelete($id)
  {
    $result = $this->userModel->delete($id);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/admin-management');
  }
}
