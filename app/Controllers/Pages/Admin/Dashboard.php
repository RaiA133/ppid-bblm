<?php

namespace App\Controllers\Pages\Admin;

use DateTime;
use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\LoginModel;
use Myth\Auth\Models\PermissionModel;

class Dashboard extends BaseController
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
    $string = $this->request->getVar('range');
    $dateRangeArray = explode(" to ", $string);

    if (empty($string)) $formattedDateRange = 'All Time';
    else $formattedDateRange = $this->formatDateRange($dateRangeArray);

    $newRegister = $this->getNewRegisterCount($dateRangeArray);
    $totalAdmin = $this->getTotalAdminCount($dateRangeArray);
    $totalLoginAttemptSuccess = $this->getTotalLoginAttemptSuccessCount($dateRangeArray);

    $data = [
      'title' => 'Dashboard',
      'stringRange' => $string,
      'newRegister' => $newRegister,
      'totalAdmin' => $totalAdmin,
      'totalLoginAttemptSuccess' => [
        'count' => $totalLoginAttemptSuccess,
        'formattedDateRange' => $formattedDateRange,
      ],
    ];

    return view('Pages/Admin/Pages/Dashboard/Index', $data);
  }

  private function formatDateRange(array $dateRangeArray): string
  {
    if (count($dateRangeArray) === 1) {
      $formatedStartDate = new DateTime($dateRangeArray[0]);
      return $formatedStartDate->format('M jS');
    } else if (count($dateRangeArray) === 2) {
      $formatedStartDate = new DateTime($dateRangeArray[0]);
      $formatedEndDate = new DateTime($dateRangeArray[1]);
      return $formatedStartDate->format('M jS') . ' - ' . $formatedEndDate->format('M jS');
    };
  }

  private function getNewRegisterCount(array $dateRangeArray): int
  {
    if (count($dateRangeArray) === 1) {
      $startDate = $dateRangeArray[0];
      return $this->userModel
        ->where('users.deleted_at', null)
        ->where('users.created_at >=', $startDate . ' 00:00:00')
        ->where('users.created_at <=', $startDate . ' 23:59:59')
        ->countAllResults();
    } else if (count($dateRangeArray) === 2) {
      $startDate = $dateRangeArray[0];
      $endDate = $dateRangeArray[1];
      return $this->userModel
        ->where('users.deleted_at', null)
        ->where('users.created_at >=', $startDate . ' 00:00:00')
        ->where('users.created_at <=', $endDate . ' 23:59:59')
        ->countAllResults();
    }

    return $this->userModel->where('users.deleted_at', null)->countAllResults();
  }

  private function getTotalAdminCount(array $dateRangeArray): int
  {
    if (count($dateRangeArray) === 1) {
      $startDate = $dateRangeArray[0];
      return $this->userModel
        ->select('name as role, created_at, updated_at, deleted_at')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->where('users.deleted_at', null)
        ->where('auth_groups.name', 'admin')
        ->where('users.created_at >=', $startDate . ' 00:00:00')
        ->where('users.created_at <=', $startDate . ' 23:59:59')
        ->countAllResults();
    } else if (count($dateRangeArray) === 2) {
      $startDate = $dateRangeArray[0];
      $endDate = $dateRangeArray[1];
      return $this->userModel
        ->select('name as role, created_at, updated_at, deleted_at')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->where('users.deleted_at', null)
        ->where('auth_groups.name', 'admin')
        ->where('users.created_at >=', $startDate . ' 00:00:00')
        ->where('users.created_at <=', $endDate . ' 23:59:59')
        ->countAllResults();
    }

    return $this->userModel
      ->select('name as role, created_at, updated_at, deleted_at')
      ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
      ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
      ->where('users.deleted_at', null)
      ->where('auth_groups.name', 'admin')
      ->countAllResults();
  }

  private function getTotalLoginAttemptSuccessCount(array $dateRangeArray): int
  {
    if (count($dateRangeArray) === 1) {
      $startDate = $dateRangeArray[0];
      return $this->db->table('auth_logins')
        ->where('success', 1)
        ->where('date >=', $startDate . ' 00:00:00')
        ->where('date <=', $startDate . ' 23:59:59')
        ->countAllResults();
    } else if (count($dateRangeArray) === 2) {
      $startDate = $dateRangeArray[0];
      $endDate = $dateRangeArray[1];
      return $this->db->table('auth_logins')
        ->where('success', 1)
        ->where('date >=', $startDate . ' 00:00:00')
        ->where('date <=', $endDate . ' 23:59:59')
        ->countAllResults();
    }

    return $this->db->table('auth_logins')
      ->where('success', 1)
      ->countAllResults();
  }
}
