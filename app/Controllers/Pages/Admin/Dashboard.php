<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\SQLite3\Table;
use DateTime;
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

    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];

        $formatedStartDate = new DateTime($startDate);
        $formattedDateRange = $formatedStartDate->format('M jS');

        $newRegister = $this->userModel
          ->where('users.deleted_at', null)
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();

        $totalAdmin = $this->userModel
          ->select('name as role, created_at, updated_at, deleted_at')
          ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
          ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
          ->where('users.deleted_at', null)
          ->where('auth_groups.name', 'admin')
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();

        $totalLoginAttemptSuccess = $this->db->table('auth_logins')
          ->where('success', 1)
          ->where('date >=', $startDate . ' 00:00:00')
          ->where('date <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];

        $formatedStartDate = new DateTime($startDate);
        $formatedEndDate = new DateTime($endDate);
        $startFormatted = $formatedStartDate->format('M jS');
        $endFormatted = $formatedEndDate->format('M jS');
        $formattedDateRange = "$startFormatted - $endFormatted";

        $newRegister = $this->userModel
          ->where('users.deleted_at', null)
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();

        $totalAdmin = $this->userModel
          ->select('name as role, created_at, updated_at, deleted_at')
          ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
          ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
          ->where('users.deleted_at', null)
          ->where('auth_groups.name', 'admin')
          ->where('users.created_at >=', $startDate . ' 00:00:00')
          ->where('users.created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();

        $totalLoginAttemptSuccess = $this->db->table('auth_logins')
          ->where('success', 1)
          ->where('date >=', $startDate . ' 00:00:00')
          ->where('date <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {

      $formattedDateRange = null;

      $newRegister = $this->userModel
        ->where('users.deleted_at', null)
        ->countAllResults();

      $totalAdmin = $this->userModel
        ->select('name as role, created_at, updated_at, deleted_at')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->where('users.deleted_at', null)
        ->where('auth_groups.name', 'admin')
        ->countAllResults();

      $totalLoginAttemptSuccess = $this->db->table('auth_logins')
        ->where('success', 1)
        ->countAllResults();
    }

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
}
