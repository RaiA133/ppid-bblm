<?php

namespace App\Models\InformasiPublik;

use CodeIgniter\Model;

class InformasiSetiapSaatModel extends Model
{
  protected $table            = 'informasi_setiap_saat';
  protected $primaryKey       = 'id_informasi_setiap_saat';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['id_informasi_setiap_saat_judul', 'jenis_informasi', 'informasi'];

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

  // get data informasi_setiap_saat with paginate | admin
  public function getInformasiSetiapSaat($dataCountOnePage = 5)
  {
    $query = $this->table('informasi_setiap_saat');
    $query->join('informasi_setiap_saat_judul', 'informasi_setiap_saat_judul.id_informasi_setiap_saat_judul = informasi_setiap_saat.id_informasi_setiap_saat_judul');
    $query->orderBy('informasi_setiap_saat.id_informasi_setiap_saat', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'informasi_setiap_saat');
    return $result;
  }

  // search data informasi_setiap_saat | admin
  public function search($keyword)
  {
    $query = $this->table('informasi_setiap_saat');
    $query->where('informasi_setiap_saat.deleted_at', null);
    $query->groupStart()
      ->like('jenis_informasi', $keyword)
      ->orLike('informasi', $keyword)
      ->orLike('judul', $keyword)
      ->groupEnd();
    return $query;
  }

  // create data informasi_setiap_saat | admin
  public function create($data = [])
  {
    $this->save([
      'id_informasi_setiap_saat_judul' => $data['judul_create'],
      'jenis_informasi' => $data['jenis_informasi_create'],
      'informasi' => $data['informasi_create'],
    ]);
  }

  // delete data informasi_setiap_saat by ID | admin
  public function remove($id_informasi_setiap_saat)
  {
    $query = $this->table('informasi_setiap_saat');
    $result = $query->delete($id_informasi_setiap_saat); // auto soft delete from model
    return $result;
  }

  // update data informasi_setiap_saat | admin
  public function edit($id_informasi_setiap_saat, $dataToEdit = [])
  {
    $this->save([
      'id_informasi_setiap_saat' => $id_informasi_setiap_saat,
      'id_informasi_setiap_saat_judul' =>  $dataToEdit['judul_edit'],
      'jenis_informasi' =>  $dataToEdit['jenis_informasi_edit'],
      'informasi' =>  $dataToEdit['informasi_edit'],
    ]);
    return true;
  }
}
