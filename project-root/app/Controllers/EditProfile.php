<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use App\Models\PhoneNumber;
use CodeIgniter\CLI\Console;
use CodeIgniter\HTTP\ResponseInterface;

class EditProfile extends BaseController
{
protected $usersModel;
protected $validation;
protected $key;
protected $iv;
protected $cipher;
protected $session;


    public function index()
    {
        $session = \Config\Services::session();
        if(!$session->has('username')) {
            return redirect()->to(base_url('/'));
        } else {
            return view('profile');
        }
    }

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->validation = \Config\Services::validation();
        $this->key = \Config\Encryption::$key;
        $this->iv = \Config\Encryption::$iv;
        $this->cipher = \Config\Encryption::$cipher;
    }

    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('login'));
        }

        $user = $this->usersModel->find($userId);

        

        return view('profile', [
            'user' => $user,
        ]);
    }

//     function decrypt_value($value) jos nijesam ovo napravio malo sam se sjebo
// {
//     return openssl_decrypt($value, $this->cipher, $this->key, 0, $this->iv);
// }

    public function processUpdateProfile()
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to(base_url('login'));
        }

        // Validira polja inputa
        $rules = [
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required|valid_email',
            'username' => 'required|min_length[5]|max_length[16]',
            'phone' => 'required',
            'old_password' => 'required',
            'new_password' => 'permit_empty|min_length[7]',
            'confirm_password' => 'matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            $validationErrors = $this->validation->listErrors();
            log_message('error', 'Validation errors: ' . $validationErrors); // Debug za validaciju
            return redirect()->back()->to(base_url('profile'))->with('error', $validationErrors);
        }

        // Uzima vrijednosti korisnika
        $user = $this->usersModel->find($userId);

        //Ovo sam stavio za log provjeru

        log_message('debug', 'User data before update: ' . print_r($user, true));

        // Verifikuje stari password
        if (!password_verify($this->request->getPost('old_password'), $user['password'])) {
            log_message('error', 'Old password is incorrect.');
            return redirect()->back()->withInput()->with('error', 'Stara lozinka je netačna.');
        }

        // Priprema sa novim podacima
        $userData = [
            'first_name' => openssl_encrypt($this->request->getPost('fName'), $this->cipher, $this->key, 0, $this->iv),
            'last_name' => openssl_encrypt($this->request->getPost('lName'), $this->cipher, $this->key, 0, $this->iv),
            'email' => openssl_encrypt($this->request->getPost('email'), $this->cipher, $this->key, 0, $this->iv),
            'username' => openssl_encrypt($this->request->getPost('username'), $this->cipher, $this->key, 0, $this->iv),
            'phone_number' => openssl_encrypt($this->request->getPost('phone'), $this->cipher, $this->key, 0, $this->iv),
        ];

        if ($this->request->getPost('new_password')) {
            $userData['password'] = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        }

        // I ovdje stavljam debug logove

        log_message('debug', 'User data to update: ' . print_r($userData, true));


        // Da li uopste ima promjena?
        $hasUserDataChanges = array_diff_assoc($userData, array_intersect_key($user, $userData));

        if (empty($hasUserDataChanges) && empty($hasPhoneNumberChanges)) {
            log_message('debug', 'Nema promjene u user data.');
            $session->setFlashdata('info', 'Nema promjena.');
            return redirect()->back()->withInput();
        }

        // Ako ima, update
        if (!empty($hasUserDataChanges)) {
            if ($this->usersModel->update($userId, $userData)) {
                $session->setFlashdata('success', 'Promjene uspješno sačuvane!');
            } else {
                $session->setFlashdata('error', 'Neuspješno ažuriranje. Pokušajte ponovo.');
            }
        }

        return redirect()->to(base_url('profile'));
    }
}
