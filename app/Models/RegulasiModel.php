<?php

namespace App\Models;

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
  protected $useTimestamps = false;
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



  // get data regulasi with paginate
  public function getRegulasi($dataCountOnePage = 5)
  {
    return $this->paginate($dataCountOnePage, 'regulasi');
  }

  // search data regulasi
  public function search($keyword)
  {
    $builder = $this->table('regulasi');
    $builder->like('judul', $keyword);
    return $builder;
  }
}
