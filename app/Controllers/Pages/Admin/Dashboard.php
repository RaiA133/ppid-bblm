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

    $formattedDateRange = $this->formatDateRange($dateRangeArray, $string);
    $newRegister = $this->getNewRegisterCount($dateRangeArray, $string);
    $totalAdmin = $this->getTotalAdminCount($dateRangeArray, $string);
    $totalLoginAttemptSuccess = $this->getTotalLoginAttemptSuccessCount($dateRangeArray, $string);

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

  private function formatDateRange($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $formatedStartDate = new DateTime($startDate);
        $formattedDateRange = $formatedStartDate->format('M jS');
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $formatedStartDate = new DateTime($startDate);
        $formatedEndDate = new DateTime($endDate);
        $startFormatted = $formatedStartDate->format('M jS');
        $endFormatted = $formatedEndDate->format('M jS');
        $formattedDateRange = "$startFormatted - $endFormatted";
      }
    } else $formattedDateRange = null;
    return $formattedDateRange;
  }

  private function getNewRegisterCount($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $newRegister = $this->userModel
          ->where('users.deleted_at', null)
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $newRegister = $this->userModel
          ->where('users.deleted_at', null)
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $newRegister = $this->userModel
        ->where('users.deleted_at', null)
        ->countAllResults();
    }
    return $newRegister;
  }

  private function getTotalAdminCount($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalAdmin = $this->userModel
          ->select('name as role, created_at, updated_at, deleted_at')
          ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
          ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
          ->where('users.deleted_at', null)
          ->where('auth_groups.name', 'admin')
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalAdmin = $this->userModel
          ->select('name as role, created_at, updated_at, deleted_at')
          ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
          ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
          ->where('users.deleted_at', null)
          ->where('auth_groups.name', 'admin')
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalAdmin = $this->userModel
        ->select('name as role, created_at, updated_at, deleted_at')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->where('users.deleted_at', null)
        ->where('auth_groups.name', 'admin')
        ->countAllResults();
    }
    return $totalAdmin;
  }

  private function getTotalLoginAttemptSuccessCount($dateRangeArray, $string) {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalLoginAttemptSuccess = $this->db->table('auth_logins')
          ->where('success', 1)
          ->where('date >=', $startDate . ' 00:00:00')
          ->where('date <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalLoginAttemptSuccess = $this->db->table('auth_logins')
          ->where('success', 1)
          ->where('date >=', $startDate . ' 00:00:00')
          ->where('date <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalLoginAttemptSuccess = $this->db->table('auth_logins')
        ->where('success', 1)
        ->countAllResults();
    }
    return $totalLoginAttemptSuccess;
  }
}
