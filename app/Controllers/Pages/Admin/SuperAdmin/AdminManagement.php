<?php

namespace App\Controllers\Pages\Admin\SuperAdmin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\LoginModel;
use Myth\Auth\Models\PermissionModel;

class AdminManagement extends BaseController
{
  protected $userModel;
  protected $groupModel;
  protected $loginModel;
  protected $permissionModel;
  public function __construct()
  {
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

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $results = $this->userModel
      ->select('users.id as userid, username, email, fullname, user_image, name, created_at, updated_at, deleted_at')
      ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
      ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
      ->where('users.deleted_at', null)
      ->groupStart()
      ->like('username', $keyword)
      ->orLike('email', $keyword)
      ->groupEnd()
      ->orderBy('users.id', 'DESC')
      ->paginate($dataCountOnePage, 'users');
    else $results = $this->userModel
      ->select('users.id as userid, username, email, fullname, user_image, name as role, created_at, updated_at, deleted_at')
      ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
      ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
      ->orderBy('users.id', 'DESC')
      ->paginate($dataCountOnePage, 'users');

    $data = [
      'title' => 'Admin Management',
      'pager' => $this->userModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'roleList' => $roleList,
      'results' =>  $results,
    ];
    return view('Pages/Admin/Pages/SuperAdmin/AdminManagement/Index', $data);
  }

  public function indexUpdate($id_regulasi)
  {
    $validationRule = [
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => '{field} harus diisi']
      ],
      'link_drive_edit' => [
        'rules' => 'required|regex_match[/^(https?:\/\/)?(www\.)?drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+$/]',
        'errors' => [
          'required' => 'Link Google Drive harus diisi',
          'regex_match' => 'Link harus dalam format Google Drive yang valid.<br>Contoh : https://drive.google.com/file/d/1KefQXXB9d0uI3frBsdshvkcIUT6r1LE6D'
        ]
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataRegulasi' . $id_regulasi, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->userModel->edit($id_regulasi, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/regulasi');
  }

  public function indexDelete($id_regulasi)
  {
    $result = $this->userModel->remove($id_regulasi);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/regulasi');
  }
}
