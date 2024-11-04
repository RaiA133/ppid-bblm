<?php

namespace App\Models\InformasiPublik;

use CodeIgniter\Model;

class InformasiSertaMertaModel extends Model
{
  protected $table            = 'informasi_serta_merta';
  protected $primaryKey       = 'id_informasi_serta_merta';
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

  // Get data informasi serta merta with paginate | admin
  public function getInformasi_Serta_Merta()
  {
    $query = $this->table('informasi_serta_merta');
    $query->orderBy('id_informasi_serta_merta', 'DESC');
    return $query->findAll();
  }

  // Update data unit pelayanan publik | admin
  public function edit($id_informasi_serta_merta, $dataToEdit = [])
  {
    $data = [
      'id_informasi_serta_merta' => $id_informasi_serta_merta,
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'link_gambar_content' =>  $dataToEdit['link_gambar_content_edit'],
      'content' =>  $dataToEdit['content_edit'],
    ];
    $query = $this->table('informasi_serta_merta');
    $query->replace($data);
    return true;
  }
}
