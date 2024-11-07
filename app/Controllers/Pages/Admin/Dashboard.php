<?php

namespace App\Controllers\Pages\Admin;

use DateTime;
use App\Controllers\BaseController;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\LoginModel;
use Myth\Auth\Models\PermissionModel;

use App\Models\HubungiKamiModel;
use App\Models\RegulasiModel;
use App\Models\InformasiPublik\InformasiBerkalaModel;
use App\Models\InformasiPublik\InformasiSetiapSaatModel;
use App\Models\LayananInformasi\PermohonanInformasiModel;

class Dashboard extends BaseController
{
  protected $db;
  protected $userModel;
  protected $groupModel;
  protected $loginModel;
  protected $permissionModel;

  protected $hubungiKamiModel;
  protected $regulasiModel;
  protected $informasiBerkalaModel;
  protected $informasiSetiapSaatModel;
  protected $permohonanInformasiModel;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->userModel = new UserModel();
    $this->groupModel = new GroupModel();
    $this->loginModel = new LoginModel();
    $this->permissionModel = new PermissionModel();

    $this->hubungiKamiModel = new HubungiKamiModel();
    $this->regulasiModel = new RegulasiModel();
    $this->informasiBerkalaModel = new InformasiBerkalaModel();
    $this->informasiSetiapSaatModel = new InformasiSetiapSaatModel();
    $this->permohonanInformasiModel = new PermohonanInformasiModel();

  }

  public function index(): string
  {
    $string = $this->request->getVar('range');
    $dateRangeArray = explode(" to ", $string);

    $formattedDateRange = $this->formatDateRange($dateRangeArray, $string);
    $newRegister = $this->getNewRegisterCount($dateRangeArray, $string);
    $totalAdmin = $this->getTotalAdminCount($dateRangeArray, $string);
    $totalLoginAttemptSuccess = $this->getTotalLoginAttemptSuccessCount($dateRangeArray, $string);
    $newRegisterCountChart = $this->getNewRegisterCountChart($dateRangeArray, $string);
    
    $totalHubungiKami = $this->getTotalHubungiKami($dateRangeArray, $string);
    $totalRegulasi = $this->getTotalRegulasi($dateRangeArray, $string);
    $totalInformasiBerkala = $this->getTotalInformasiBerkala($dateRangeArray, $string);
    $totalInformasiSetiapSaat = $this->getTotalInformasiSetiapSaat($dateRangeArray, $string);
    $totalPermohonanInformasi = $this->getTotalPermohonanInformasi($dateRangeArray, $string);

    $data = [
      'title' => 'Dashboard',
      'stringRange' => $string,
      'newRegister' => $newRegister,
      'totalAdmin' => $totalAdmin,
      'totalLoginAttemptSuccess' => [
        'count' => $totalLoginAttemptSuccess,
        'formattedDateRange' => $formattedDateRange,
      ],
      
      // CHART
      'charts' => [
        'newRegisterCountChart' => [
          'labels' => $newRegisterCountChart['labels'],
          'data' => $newRegisterCountChart['data'],
        ]
      ],

      // Total Data & Dokumen
      'totalDataDanDokumen' => [
        'totalHubungiKami' => $totalHubungiKami,
        'totalRegulasi' => $totalRegulasi,
        'totalInformasiBerkala' => $totalInformasiBerkala,
        'totalInformasiSetiapSaat' => $totalInformasiSetiapSaat,
        'totalPermohonanInformasi' => $totalPermohonanInformasi,
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
          ->where('auth_groups_users.updated_at >=', $startDate . ' 00:00:00')
          ->where('auth_groups_users.updated_at <=', $startDate . ' 23:59:59')
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
          ->where('auth_groups_users.updated_at >=', $startDate . ' 00:00:00')
          ->where('auth_groups_users.updated_at <=', $endDate . ' 23:59:59')
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

  private function getTotalLoginAttemptSuccessCount($dateRangeArray, $string)
  {
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

  private function getNewRegisterCountChart($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $labels = [];
        $data = [];

        for ($hour = 0; $hour < 24; $hour++) {
          $labels[] = sprintf('%02d:00', $hour);
        }

        for ($hour = 0; $hour < 24; $hour++) {
          $hourStart = $startDate . ' ' . sprintf('%02d:00:00', $hour);  // Mulai jam
          $hourEnd = $startDate . ' ' . sprintf('%02d:59:59', $hour);    // Akhir jam
          $count = $this->userModel
            ->where('users.deleted_at', null)
            ->where('users.created_at >=', $hourStart)
            ->where('users.created_at <=', $hourEnd)
            ->countAllResults();
          $data[] = $count;
        }

        $NewRegisterChart = ['labels' => $labels, 'data' => $data];
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];

        $startDateObj = new DateTime($startDate);
        $endDateObj = new DateTime($endDate);
        $dateDiff = $startDateObj->diff($endDateObj);

        if ($dateDiff->days <= 7) $NewRegisterChart = $this->getNewRegisterCountChartByDay($startDate, $endDate);     // Rentang waktu <= 1 minggu, Hitung per hari
        else if ($dateDiff->m <= 2) $NewRegisterChart = $this->getNewRegisterCountChartByWeek($startDate, $endDate);  // Rentang waktu <= 2 bulan, Hitung per minggu
        else $NewRegisterChart = $this->getNewRegisterCountChartByMonth($startDate, $endDate);                        // Rentang waktu > 2 bulan, Hitung per bulan
      }
    } else {                                                                                                          // Rentang waktu 1 Tahun , Hitung per bulan
      $currentYear = date('Y');
      $months = [];
      $dataPerMonth = [];
      
      for ($month = 1; $month <= 12; $month++) {
        $startOfMonth = "{$currentYear}-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-01";  // Awal bulan
        $endOfMonth = date("Y-m-t", strtotime($startOfMonth));  // Akhir bulan

        $userCount = $this->userModel
          ->where('users.deleted_at', null)
          ->where('users.created_at >=', $startOfMonth . ' 00:00:00')
          ->where('users.created_at <=', $endOfMonth . ' 23:59:59')
          ->countAllResults();

        $months[] = date("M", strtotime($startOfMonth)); 
        $dataPerMonth[] = $userCount; 
      }

      $NewRegisterChart = [
        'labels' => $months,  
        'data' => $dataPerMonth
      ];
    }
    return $NewRegisterChart;
  }

  private function getNewRegisterCountChartByDay($startDate, $endDate)
  {
    $labels = [];
    $data = [];

    $currentDate = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);

    while ($currentDate <= $endDateObj) {
      $labels[] = $currentDate->format('M jS');  // Format tanggal per hari
      $count = $this->userModel
        ->where('users.deleted_at', null)
        ->where('users.created_at >=', $currentDate->format('Y-m-d') . ' 00:00:00')
        ->where('users.created_at <=', $currentDate->format('Y-m-d') . ' 23:59:59')
        ->countAllResults();

      $data[] = $count;
      $currentDate->modify('+1 day');
    }

    return ['labels' => $labels, 'data' => $data];
  }

  private function getNewRegisterCountChartByWeek($startDate, $endDate)
  {
    $labels = [];
    $data = [];

    $startDateObj = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);
    $startDateObj->modify('this week');  // Menyusun minggu pertama
    $endDateObj->modify('this week');    // Menyusun minggu terakhir

    while ($startDateObj <= $endDateObj) {
      $labels[] = $startDateObj->format('M jS');
      $count = $this->userModel
        ->where('users.deleted_at', null)
        ->where('users.created_at >=', $startDateObj->format('Y-m-d') . ' 00:00:00')
        ->where('users.created_at <=', $startDateObj->format('Y-m-d') . ' 23:59:59')
        ->countAllResults();

      $data[] = $count;
      $startDateObj->modify('+1 week');
    }

    return ['labels' => $labels, 'data' => $data];
  }

  private function getNewRegisterCountChartByMonth($startDate, $endDate)
  {
    $labels = [];
    $data = [];

    $startDateObj = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);

    while ($startDateObj <= $endDateObj) { // Loop melalui setiap bulan dalam rentang waktu
      $labels[] = $startDateObj->format('M Y');
      $count = $this->userModel
        ->where('users.deleted_at', null)
        ->where('users.created_at >=', $startDateObj->format('Y-m-01') . ' 00:00:00')
        ->where('users.created_at <=', $startDateObj->format('Y-m-t') . ' 23:59:59')
        ->countAllResults();

      $data[] = $count;
      $startDateObj->modify('+1 month');
    }

    return ['labels' => $labels, 'data' => $data];
  }

  private function getTotalHubungiKami($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalHubungiKami = $this->hubungiKamiModel
          ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalHubungiKami = $this->hubungiKamiModel
        ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalHubungiKami = $this->hubungiKamiModel
        ->where('deleted_at', null)
        ->countAllResults();
    }
    return $totalHubungiKami;
  }

  private function getTotalRegulasi($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalRegulasi = $this->regulasiModel
          ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalRegulasi = $this->regulasiModel
        ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalRegulasi = $this->regulasiModel
        ->where('deleted_at', null)
        ->countAllResults();
    }
    return $totalRegulasi;
  }

  private function getTotalInformasiBerkala($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalInformasiBerkala = $this->informasiBerkalaModel
          ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalInformasiBerkala = $this->informasiBerkalaModel
        ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalInformasiBerkala = $this->informasiBerkalaModel
        ->where('deleted_at', null)
        ->countAllResults();
    }
    return $totalInformasiBerkala;
  }

  private function getTotalInformasiSetiapSaat($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalInformasiSetiapSaat = $this->informasiSetiapSaatModel
          ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalInformasiSetiapSaat = $this->informasiSetiapSaatModel
        ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalInformasiSetiapSaat = $this->informasiSetiapSaatModel
        ->where('deleted_at', null)
        ->countAllResults();
    }
    return $totalInformasiSetiapSaat;
  }

  private function getTotalPermohonanInformasi($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalPermohonanInformasi = $this->permohonanInformasiModel
          ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalPermohonanInformasi = $this->permohonanInformasiModel
        ->where('deleted_at', null)
          ->where('created_at >=', $startDate . ' 00:00:00')
          ->where('created_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalPermohonanInformasi = $this->permohonanInformasiModel
        ->where('deleted_at', null)
        ->countAllResults();
    }
    return $totalPermohonanInformasi;
  }
}
