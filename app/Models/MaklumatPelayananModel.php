<?php

namespace App\Models;

use CodeIgniter\Model;

class MaklumatPelayananModel extends Model
{
  protected $table            = 'maklumat_pelayanan';
  protected $primaryKey       = 'id_maklumat_pelayanan';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['link_gambar', 'content'];

  protected bool $allowEmptyInserts = false;
  protected bool $updateOnlyChanged = true;

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
  public function getMaklumat_Pelayanan($dataCountOnePage = 5)
  {
    return $this->where('deleted_at', null)
      ->orderBy('id_maklumat_pelayanan', 'DESC')
      ->paginate($dataCountOnePage, 'maklumat_pelayanan');
  }

  // Create data maklumat pelayanan | admin
  public function create($data = [])
  {
    return $this->save([
      'link_gambar' => $data['link_gambar'],
      'content'     => $data['content'],
    ]);
  }

  // Delete data maklumat pelayanan by ID | admin
  public function remove($id_maklumat_pelayanan)
  {
    return $this->delete($id_maklumat_pelayanan); // Auto soft delete using model
  }

  // Update data maklumat pelayanan | admin
  public function edit($id_maklumat_pelayanan, $dataToEdit = [])
  {
    // Mengupdate data dengan ID tertentu
    return $this->save([
      'id_maklumat_pelayanan' => $id_maklumat_pelayanan,
      'link_gambar'           => $dataToEdit['link_gambar'] ?? null,
      'content'               => $dataToEdit['content'] ?? null,
    ]);
  }
}
