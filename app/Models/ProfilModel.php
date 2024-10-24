<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
  protected $table            = 'profil';
  protected $primaryKey       = 'id_profil';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['nama', 'judul', 'latar_belakang_pendidikan', 'penghargaan', 'link_gambar', 'content'];

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

  public function getProfil()
  {
    $query = $this->table('profil');
    $query->orderBy('id_profil', 'DESC');
    return $query->findAll();
  }

  // update data profil | admin
  public function edit($id_regulasi, $dataToEdit = [])
  {
    $data = [
      'id_profil' => $id_regulasi,
      'nama' =>  $dataToEdit['nama_edit'],
      'judul' =>  $dataToEdit['judul_edit'],
      'latar_belakang_pendidikan' =>  $dataToEdit['latar_belakang_pendidikan_edit'],
      'penghargaan' =>  $dataToEdit['penghargaan_edit'],
      'link_gambar' =>  $dataToEdit['link_gambar_edit'],
      'content' =>  $dataToEdit['content_edit'],
      'link_gambar_content' =>  $dataToEdit['link_gambar_content_edit'],
    ];
    $query = $this->table('profil');
    $query->replace($data);
    return true;
  }
}
