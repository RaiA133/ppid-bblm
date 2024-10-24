<?php

namespace App\Controllers\Pages\Admin\SuperAdmin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class AdminManagement extends BaseController
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index(): string
  {

    $currentPage = $this->request->getVar('page_admin_management') ? $this->request->getVar('page_admin_management') : 1;
    $dataCountOnePage = 10;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $results = $this->userModel
      ->where('users.deleted_at', null)
      ->groupStart()
      ->like('username', $keyword)
      ->orLike('email', $keyword)
      ->groupEnd()
      ->orderBy('id', 'DESC')
      ->paginate($dataCountOnePage, 'users');
    else $results = $this->userModel
      ->orderBy('id', 'DESC')
      ->paginate($dataCountOnePage, 'users');

    $data = [
      'title' => 'Admin Management',
      'pager' => $this->userModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' =>  $results,
    ];
    return view('Pages/Admin/Pages/SuperAdmin/AdminManagement/Index', $data);
  }
}
