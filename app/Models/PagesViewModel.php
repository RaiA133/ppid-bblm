<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Faker\Generator;

class PagesViewModel extends Model
{
  protected $table            = 'pages_view';
  protected $primaryKey       = 'id_pages_view';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['ip_address', 'user_id', 'email', 'halaman'];

  protected bool $allowEmptyInserts = false;
  protected bool $updateOnlyChanged = true;

  protected array $casts = [];
  protected array $castHandlers = [];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert   = [];
  protected $afterInsert    = [];
  protected $beforeUpdate   = [];
  protected $afterUpdate    = [];
  protected $beforeFind     = [];
  protected $afterFind      = [];
  protected $beforeDelete   = [];
  protected $afterDelete    = [];


  public function fake(Generator &$faker)
  {
    return [
      'ip_address'  => $faker->ipv4(),
      'user_id'  => $faker->randomElement([1, 2, 3, 4]),
      'email'  => $faker->email(),
      'halaman'  => $faker->randomElement([
        'http://localhost/BBLM/ppid-bblm/public/',
        'http://localhost/BBLM/ppid-bblm/public/home',
        'http://localhost/BBLM/ppid-bblm/public/regulasi',
        'http://localhost/BBLM/ppid-bblm/public/profil',
        'http://localhost/BBLM/ppid-bblm/public/informasi-berkala',
        'http://localhost/BBLM/ppid-bblm/public/tata-cara-permohonan',
        'http://localhost/BBLM/ppid-bblm/public/permohonan-informasi',
        'http://localhost/BBLM/ppid-bblm/public/hubungi-kami'
      ]),
      'created_at'  => Time::createFromTimestamp($faker->unixTime()),
      'updated_at'  => Time::now(),
    ];
  }

  public function getPagesViewData($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $dataPagesView = $this->table('pages_view')
          ->select('*')
          ->where('deleted_at', null)
          ->where('updated_at >=', $startDate . ' 00:00:00')
          ->where('updated_at <=', $startDate . ' 23:59:59')
          ->orderBy('updated_at', 'DESC');
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $dataPagesView = $this->table('pages_view')
          ->select('*')
          ->where('deleted_at', null)
          ->where('updated_at >=', $startDate . ' 00:00:00')
          ->where('updated_at <=', $endDate . ' 23:59:59')
          ->orderBy('updated_at', 'DESC');
      }
    } else {
      $dataPagesView = $this->table('pages_view')
        ->select('*')
        ->where('deleted_at', null)
        ->orderBy('updated_at', 'DESC');
    }
    return $dataPagesView->get()->getResult();
  }

  public function getPagesViewCount($dateRangeArray, $string)
  {
    if ($string) {
      if (count($dateRangeArray) === 1) {
        $startDate = $dateRangeArray[0];
        $totalPagesView = $this->table('pages_view')
          ->where('deleted_at', null)
          ->orderBy('id_pages_view', 'DESC')
          ->where('updated_at >=', $startDate . ' 00:00:00')
          ->where('updated_at <=', $startDate . ' 23:59:59')
          ->countAllResults();
      } else {
        $startDate = $dateRangeArray[0];
        $endDate = $dateRangeArray[1];
        $totalPagesView = $this->table('pages_view')
          ->where('deleted_at', null)
          ->orderBy('id_pages_view', 'DESC')
          ->where('updated_at >=', $startDate . ' 00:00:00')
          ->where('updated_at <=', $endDate . ' 23:59:59')
          ->countAllResults();
      }
    } else {
      $totalPagesView = $this->table('pages_view')
        ->where('deleted_at', null)
        ->orderBy('id_pages_view', 'DESC')
        ->countAllResults();
    }
    return $totalPagesView;
  }

  public function create($data = [])
  {
    $this->save([
      'ip_address' => $data['ip_address_create'],
      'user_id' => $data['user_id_create'],
      'email' => $data['email_create'],
      'halaman' => $data['halaman_create'],
    ]);
    return $this->db->affectedRows();
  }
}
