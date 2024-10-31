<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Faker\Generator;

class HubungiKamiModel extends Model
{
  protected $table            = 'hubungi_kami';
  protected $primaryKey       = 'id_hubungi_kami';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['nama', 'email', 'perusahaan', 'no_telp', 'pesan', 'kota', 'user_image', 'read'];

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
      'nama'  => $faker->name(),
      'email'  => $faker->email(),
      'perusahaan'  => $faker->company(),
      'no_telp'  => $faker->phoneNumber(),
      'pesan'  => $faker->paragraph(),
      'kota'  => $faker->city(),
      'created_at'  => Time::createFromTimestamp($faker->unixTime()),
      'updated_at'  => Time::now(),
    ];
  }

  // get data hubungi_kami with paginate | admin
  public function getHubungiKami($dataCountOnePage = 5)
  {
    $query = $this->table('hubungi_kami');
    $query->orderBy('id_hubungi_kami', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'hubungi_kami');
    return $result;
  }

  // search data hubungi_kami | admin
  public function search($keyword)
  {
    $query = $this->table('hubungi_kami');
    $query->where('hubungi_kami.deleted_at', null);
    $query->groupStart()
      ->like('email', $keyword)
      ->orLike('kota', $keyword)
      ->orLike('perusahaan', $keyword)
      ->orLike('no_telp', $keyword)
      ->groupEnd();
    return $query;
  }

  // create data hubungi_kami | user
  public function create($data = [])
  {
    $this->save([
      'nama' => $data['nama_create'],
      'email' => $data['email_create'],
      'perusahaan' => $data['perusahaan_create'],
      'no_telp' => $data['no_telp_create'],
      'pesan' => $data['pesan_create'],
      'kota' => $data['kota_create'],
      'user_image' => $data['user_image_create'],
      'read' => null,
    ]);
    return $this->db->affectedRows();
  }

  // delete data hubungi_kami by ID | admin
  public function remove($id_hubungi_kami)
  {
    $query = $this->table('hubungi_kami');
    $result = $query->delete($id_hubungi_kami); // auto soft delete from model
    return $result;
  }

  // update data read hubungi_kami | admin
  public function read($id_hubungi_kami)
  {
    $result = $this->db->table('hubungi_kami')
      ->where('id_hubungi_kami', $id_hubungi_kami)
      ->set('read', Time::now())
      ->update();
    return $result;
  }
}
