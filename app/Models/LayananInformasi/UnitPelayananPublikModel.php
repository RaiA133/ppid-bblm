<?php

namespace App\Models\LayananInformasi;

use CodeIgniter\Model;

class UnitPelayananPublikModel extends Model
{
  protected $table            = 'unit_pelayanan_publik';
  protected $primaryKey       = 'id_unit_pelayanan_publik';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['link_gambar', 'content'];

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

  // Get data unit pelayanan publik with paginate | admin
  public function getUnit_Pelayanan_Publik()
  {
    $query = $this->table('unit_pelayanan_publik');
    $query->orderBy('id_unit_pelayanan_publik', 'DESC');
    return $query->findAll();
  }

  // Update data unit pelayanan publik | admin
  public function edit($id_unit_pelayanan_publik, $dataToEdit = [])
  {
    $data = [
      'id_unit_pelayanan_publik' => $id_unit_pelayanan_publik,
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'link_gambar_content' =>  $dataToEdit['link_gambar_content_edit'],
      'content' =>  $dataToEdit['content_edit'],
    ];
    $query = $this->table('unit_pelayanan_publik');
    $query->replace($data);
    return true;
  }
}
