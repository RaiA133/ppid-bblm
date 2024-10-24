<?php

namespace App\Models\InformasiPublik;

use CodeIgniter\Model;

class InformasiBerkalaModel extends Model
{
  protected $table            = 'informasi_berkala';
  protected $primaryKey       = 'id_informasi_berkala';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['id_informasi_berkala_judul', 'jenis_informasi', 'informasi'];

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

  // get data informasi_berkala with paginate | admin
  public function getInformasiBerkala($dataCountOnePage = 5)
  {
    $query = $this->table('informasi_berkala');
    $query->join('informasi_berkala_judul', 'informasi_berkala_judul.id_informasi_berkala_judul = informasi_berkala.id_informasi_berkala_judul');
    $query->orderBy('informasi_berkala.id_informasi_berkala', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'informasi_berkala');
    return $result;
  }

  // search data informasi_berkala | admin
  public function search($keyword)
  {
    $query = $this->table('informasi_berkala');
    $query->like('jenis_informasi', $keyword);
    $query->orLike('informasi', $keyword);
    return $query;
  }

  // create data informasi_berkala | admin
  public function create($data = [])
  {
    $this->save([
      'id_informasi_berkala_judul' => $data['judul_create'],
      'jenis_informasi' => $data['jenis_informasi_create'],
      'informasi' => $data['informasi_create'],
    ]);
  }

  // delete data informasi_berkala by ID | admin
  public function remove($id_informasi_berkala)
  {
    $query = $this->table('informasi_berkala');
    $result = $query->delete($id_informasi_berkala); // auto soft delete from model
    return $result;
  }

  // update data informasi_berkala | admin
  public function edit($id_informasi_berkala, $dataToEdit = [])
  {
    $this->save([
      'id_informasi_berkala' => $id_informasi_berkala,
      'id_informasi_berkala_judul' =>  $dataToEdit['judul_edit'],
      'jenis_informasi' =>  $dataToEdit['jenis_informasi_edit'],
      'informasi' =>  $dataToEdit['informasi_edit'],
    ]);
    return true;
  }

}
