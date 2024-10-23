<?php

namespace App\Models\StandarLayanan;

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
    $query = $this->table('maklumat_pelayanan');
    $query->orderBy('id_maklumat_pelayanan', 'DESC');
    return $query->findAll();
  }

  // Update data maklumat pelayanan | admin
  public function edit($id_maklumat_pelayanan, $dataToEdit = [])
  {

    $data = [
      'id_maklumat_pelayanan' => $id_maklumat_pelayanan,
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'content' =>  $dataToEdit['content_edit'],
    ];
    $query = $this->table('maklumat_pelayanan');
    $query->replace($data);
    return true;
  }

  public function updateLinkGambar($dataToUpdateLinkGambar)
  {
    $this->save([
      'id_maklumat_pelayanan' => $dataToUpdateLinkGambar['id_maklumat_pelayanan'],
      'link_gambar' => $dataToUpdateLinkGambar['link_gambar'],
      'content' => $dataToUpdateLinkGambar['content'],
    ]);
    return true;
  }


  // public function updateLinkGambar($dataToUpdateLinkGambar)
  // {
  //   if (isset($dataToUpdateLinkGambar['id_maklumat_pelayanan'])) {
  //     $this->update($dataToUpdateLinkGambar['id_maklumat_pelayanan'], [
  //       'link_gambar' => $dataToUpdateLinkGambar['link_gambar'],
  //       'content' => $dataToUpdateLinkGambar['content'],
  //     ]);
  //     return true;
  //   }
  //   return false;
  // }
}
