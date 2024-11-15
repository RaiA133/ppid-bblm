<?php

namespace App\Models\LayananInformasi;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Faker\Generator;

class PermohonanInformasiModel extends Model
{
  protected $table            = 'permohonan_informasi';
  protected $primaryKey       = 'id_permohonan_informasi';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'nama',
    'no_id',
    'alamat',
    'email',
    'no_telp',
    'pertanyaan',
    'tujuan_penggunaan_info',
    'cara_memperoleh_info',
    'jenis_dokumen_info',
    'cara_dapat_salinan_info',
    'agreement',
    'user_image',
    'read',
  ];

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
      'no_id' => $faker->creditCardNumber(),
      'alamat' => $faker->address(),
      'email'  => $faker->email(),
      'no_telp'  => $faker->phoneNumber(),
      'pertanyaan' => $faker->sentence(),
      'cara_memperoleh_info' => $faker->sentence(),
      'tujuan_penggunaan_info' => $faker->randomElement(['Melihat', 'Membaca', 'Mendengar', 'Mencatat']),
      'jenis_dokumen_info' => $faker->randomElement(['Hardcopy', 'Softcopy']),
      'cara_dapat_salinan_info' => $faker->randomElement(['Mengambil Langsung', 'Kurir', 'Pos', 'Faksimili', 'Email']),
      'agreement' => true,
      'created_at'  => Time::createFromTimestamp($faker->unixTime()),
      'updated_at'  => Time::now(),
    ];
  }

  // get data permohonan_informasi with paginate | admin
  public function getPermohonanInformasi($dataCountOnePage = 5)
  {
    $query = $this->table('permohonan_informasi');
    $query->orderBy('id_permohonan_informasi', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'permohonan_informasi');
    return $result;
  }

  // search data permohonan_informasi | admin
  public function search($keyword)
  {
    $query = $this->table('permohonan_informasi');
    $query->where('permohonan_informasi.deleted_at', null);
    $query->groupStart()
      ->like('nama', $keyword)
      ->orLike('email', $keyword)
      ->groupEnd();
    return $query;
  }

  // create data permohonan_informasi | user
  public function create($data = [])
  {
    $this->save([
      'nama' => $data['nama_create'],
      'no_id' => $data['no_id_create'],
      'email' => $data['email_create'],
      'no_telp' => $data['no_telp_create'],
      'alamat' => $data['alamat_create'],
      'pertanyaan' => $data['pertanyaan_create'],
      'tujuan_penggunaan_info' => $data['tujuan_penggunaan_info_create'],
      'cara_memperoleh_info' => $data['cara_memperoleh_info_create'],
      'jenis_dokumen_info' => $data['jenis_dokumen_info_create'],
      'cara_dapat_salinan_info' => $data['cara_dapat_salinan_info_create'],
      'agreement' => $data['agreement_create'],
      'user_image' => $data['user_image_create'],
      'read' => null,
    ]);
    return $this->db->affectedRows();
  }

  // delete data permohonan_informasi by ID | admin
  public function remove($id_permohonan_informasi)
  {
    $query = $this->table('permohonan_informasi');
    $result = $query->delete($id_permohonan_informasi); // auto soft delete from model
    return $result;
  }

  // update data read permohonan_informasi | admin
  public function read($id_permohonan_informasi)
  {
    $result = $this->db->table('permohonan_informasi')
      ->where('id_permohonan_informasi', $id_permohonan_informasi)
      ->set('read', Time::now())
      ->update();
    return $result;
  }
}
