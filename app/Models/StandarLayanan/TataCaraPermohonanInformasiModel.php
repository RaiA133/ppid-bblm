<?php

namespace App\Models\StandarLayanan;

use CodeIgniter\Model;

class TataCaraPermohonanInformasiModel extends Model
{
  protected $table            = 'tata_cara_permohonan_informasi';
  protected $primaryKey       = 'id_tata_cara_permohonan_informasi';
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

  // Get data maklumat pelayanan with paginate | admin
  public function getMaklumat_Pelayanan()
  {
    $query = $this->table('tata_cara_permohonan_informasi');
    $query->orderBy('id_tata_cara_permohonan_informasi', 'DESC');
    return $query->findAll();
  }

  // Update data maklumat pelayanan | admin
  public function edit($id_tata_cara_permohonan_informasi, $dataToEdit = [])
  {
    $data = [
      'id_tata_cara_permohonan_informasi' => $id_tata_cara_permohonan_informasi,
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'link_gambar_content' =>  $dataToEdit['link_gambar_content_edit'],
      'content' =>  $dataToEdit['content_edit'],
    ];
    $query = $this->table('tata_cara_permohonan_informasi');
    $query->replace($data);
    return true;
  }
}
