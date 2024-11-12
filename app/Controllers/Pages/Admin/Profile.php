<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

// Profile Account Admin
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
      'title' => 'Profile Settings'
    ];
    return view('Pages/Admin/Pages/Profile/Index', $data);
  }

  public function indexUpdate($id)
  {
    $validationRule = [
      'username_edit' => [
        'label' => 'Username',
        'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,' . $id . ']',
      ],
      'email_edit' => [
        'label' => 'Email',
        'rules' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
      ],
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
      $namaGambar = $namaGambarLama;
    } else {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move('img/userProfilePics/', $namaGambar);
      $fileLamaPath = 'img/userProfilePics/' . $namaGambarLama;
      if (is_file($fileLamaPath) && file_exists($fileLamaPath)) {
        unlink($fileLamaPath);
      }
    }

    $dataToEdit = $this->request->getVar();
    $dataToEdit['user_image_edit'] = $namaGambar;

    // cek apa ada perubahan
    $changeUsername = user()->username !== $dataToEdit['username_edit'];
    $changeEmail = user()->email !== $dataToEdit['email_edit'];
    $changeUserImage = user()->user_image !== $dataToEdit['user_image_edit'];

    $user = $this->userModel->find($id);

    if ($user) {
      $message = '';
      if ($changeUsername || $changeEmail || $changeUserImage) { // proses update hanya boleh terjadi jika ada minimal 1 perubahan data
        $user->username = $dataToEdit['username_edit'];
        $user->email = $dataToEdit['email_edit'];
        $user->user_image = $dataToEdit['user_image_edit'];
        if ($this->userModel->save($user)) $message = 'Data updated!';
        else $message = 'Updating Data Failed!';
      } else $message = 'No data to update';
      session()->setFlashdata('Message', ['title' => $message]);
      return redirect()->to(base_url() . 'admin/profile');
    }

    return redirect()->back()->with('error', 'User not found.');
  }

  public function profilePicDelete($id)
  {
    $imageToDelete = user()->user_image;
    if ($imageToDelete && file_exists('img/userProfilePics/' . $imageToDelete)) {
      if (unlink('img/userProfilePics/' . $imageToDelete)) {
        $this->userModel->set('user_image', 'default-profile.jpg')->where('id', $id)->update();
        $message = 'Profile picture deleted successfully!';
      } else $message = 'Failed to delete profile picture!';
    } else $message = 'Image not found / already deleted!';

    session()->setFlashdata('Message', ['title' => $message]);
    return redirect()->to(base_url() . 'admin/profile');
  }
}
