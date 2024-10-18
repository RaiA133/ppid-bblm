<?php

namespace App\Models;

use CodeIgniter\Model;

class MaklumatPelayananModel extends Model
{
  protected $table            = 'maklumatpelayanan';
  protected $primaryKey       = 'id_maklumatpelayanan';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = ['link_drive'];

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


  // get data maklumat pelayanan with paginate | admin
  public function getMaklumatPelayanan($dataCountOnePage = 5)
  {
    $query = $this->table('maklumatpelayanan');
    $query->where('deleted_at', null);
    $query->orderBy('id_maklumatpelayanan', 'DESC');
    $result = $query->paginate($dataCountOnePage, 'maklumatpelayanan');
    return $result;
  }

  // search data maklumat pelayanan | admin
  public function search($keyword)
  {
    $query = $this->table('maklumatpelayanan');
    $query->like('judul', $keyword);
    return $query;
  }

  // create data regulasi | admin
  public function create($data = [])
  {
    $this->save([
      'link_drive' => $data['link_drive_create'],
    ]);
  }

  // delete data maklumat pelayanan by ID | admin
  public function remove($id_maklumatpelayanan)
  {
    $query = $this->table('maklumatpelayanan');
    $result = $query->delete($id_maklumatpelayanan); // auto soft delete from model
    return $result;
  }

  // update data maklumat pelayanan | admin
  public function edit($id_maklumatpelayanan, $dataToEdit = [])
  {
    $this->save([
      'id_maklumatpelayanan' => $id_maklumatpelayanan,
      'link_drive' => $dataToEdit['link_drive_edit'],
    ]);
    return true;
  }
}
