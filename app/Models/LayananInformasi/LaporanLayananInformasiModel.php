<?php

namespace App\Models\LayananInformasi;

use CodeIgniter\Model;

class LaporanLayananInformasiModel extends Model
{
  protected $table            = 'laporan_layanan_informasi';
  protected $primaryKey       = 'id_laporan_layanan_informasi';
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

  // Get data laporan layanan informasi with paginate | admin
  public function getLaporan_Layanan_Informasi()
  {
    $query = $this->table('laporan_layanan_informasi');
    $query->orderBy('id_laporan_layanan_informasi', 'DESC');
    return $query->findAll();
  }

  // Update data laporan layanan informasi | admin
  public function edit($id_laporan_layanan_informasi, $dataToEdit = [])
  {
    $data = [
      'id_laporan_layanan_informasi' => $id_laporan_layanan_informasi,
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'link_gambar_content' =>  $dataToEdit['link_gambar_content_edit'],
      'content' =>  $dataToEdit['content_edit'],
    ];
    $query = $this->table('laporan_layanan_informasi');
    $query->replace($data);
    return true;
  }
}
