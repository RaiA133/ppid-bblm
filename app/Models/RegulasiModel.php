<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class RegulasiModel extends Model
{
  protected $table            = 'regulasi';
  protected $primaryKey       = 'id_regulasi';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['judul', 'link_drive'];

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



  // get data regulasi with paginate | admin
  public function getRegulasi($dataCountOnePage = 5)
  {
    $query = $this->table('regulasi');
    $query->orderBy('id_regulasi', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'regulasi');
    return $result;
  }

  // search data regulasi | admin
  public function search($keyword)
  {
    $query = $this->table('regulasi');
    $query->like('judul', $keyword);
    return $query;
  }

  // create data regulasi | admin
  public function create($data = [])
  {
    $this->save([
      'judul' => $data['judul_create'],
      'link_drive' => $data['link_drive_create'],
    ]);
  }

  // delete data regulasi by ID | admin
  public function remove($id_regulasi)
  {
    $query = $this->table('regulasi');
    $result = $query->delete($id_regulasi); // auto soft delete from model
    return $result;
  }

  // update data regulasi | admin
  public function edit($id_regulasi, $dataToEdit = [])
  {
    $this->save([
      'id_regulasi' => $id_regulasi,
      'judul' =>  $dataToEdit['judul_edit'],
      'link_drive' => $dataToEdit['link_drive_edit'],
    ]);
    return true;
  }
}
