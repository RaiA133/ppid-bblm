<?php

namespace App\Models\InformasiPublik;

use CodeIgniter\Model;

class InformasiBerkalaJudulModel extends Model
{
  protected $table            = 'informasi_berkala_judul';
  protected $primaryKey       = 'id_informasi_berkala_judul';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['judul'];

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

  // get data informasi_berkala_judul with paginate | admin
  public function getInformasiBerkalaJudul($dataCountOnePage = 5)
  {
    $query = $this->table('informasi_berkala_judul');
    $query->orderBy('id_informasi_berkala_judul', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'informasi_berkala_judul');
    return $result;
  }

  // search data informasi_berkala_judul | admin
  public function search($keyword)
  {
    $query = $this->table('informasi_berkala_judul');
    $query->where('informasi_berkala_judul.deleted_at', null);
    $query->like('judul', $keyword);
    return $query;
  }

  // create data informasi_berkala_judul | admin
  public function create($data = [])
  {
    $this->save([
      'judul' => $data['judul_create'],
    ]);
  }

  // delete data informasi_berkala_judul by ID | admin
  public function remove($id_informasi_berkala_judul)
  {
    $query = $this->table('informasi_berkala_judul');
    $result = $query->delete($id_informasi_berkala_judul); // auto soft delete from model
    return $result;
  }

  // update data informasi_berkala_judul | admin
  public function edit($id_informasi_berkala_judul, $dataToEdit = [])
  {
    $this->save([
      'id_informasi_berkala_judul' => $id_informasi_berkala_judul,
      'judul' =>  $dataToEdit['judul_edit'],
    ]);
    return true;
  }
}