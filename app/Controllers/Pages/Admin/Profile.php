<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class Profile extends BaseController
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Profile'
    ];
    return view('Pages/Admin/Profile', $data);
  }

  public function indexUpdate($id)
  {
    $validationRule = [
      'username_edit' => [
        'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[30]',
      ],
      // 'email_edit' => [
      //   'rules' => 'required|valid_email',
      // ],
      'user_image_edit' => [
        'label' => 'Profile Picture',
        'rules' => [
          'max_size[user_image_edit,5120]',
          'is_image[user_image_edit]',
          'mime_in[user_image_edit,image/jpg,image/jpeg,image/png]',
        ],
      ],
    ];

    if (!$this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }

    $fileGambar = $this->request->getFile('user_image_edit');
    $namaGambarLama = $this->request->getVar('user_image_edit_old');

    if ($fileGambar->getError() == 4) {
      $namaGambar = $namaGambarLama; // Use the old image if no new one is uploaded
    } else {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move('img/profile/users/', $namaGambar); // Move the new file to the server
      $fileLamaPath = 'img/profile/users/' . $namaGambarLama;
      if (file_exists($fileLamaPath)) {
        unlink($fileLamaPath); // Unlink the old image file
      }
    }

    // Prepare data to be updated
    $dataToEdit = $this->request->getVar();
    $dataToEdit['user_image_edit'] = $namaGambar; // Update new image name
    
    // Perform the query directly in the controller
    // $this->userModel->set('email', $dataToEdit['email_edit']);
    $this->userModel->set('username', $dataToEdit['username_edit']);
    $this->userModel->set('user_image', $dataToEdit['user_image_edit']);
    $this->userModel->where('id', $id);
    $query = $this->userModel->update();

    if ($query) {
      $message = 'Data updated!';
    } else {
      $message = 'Updating Data Failed!';
    }

    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/profile');
  }
}
