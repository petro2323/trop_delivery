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
protected $phoneNumbersModel;


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
        $this->phoneNumbersModel = new PhoneNumber();
        $this->validation = \Config\Services::validation();
        $this->key = \Config\Encryption::$key;
        $this->iv = \Config\Encryption::$iv;
        $this->cipher = \Config\Encryption::$cipher;
    }


    // public function register()
    // {
    //     $this->validation->setRuleGroup('rules');

    //     if(!$this->validation->run($this->request->getPost(), 'rules')) {
    //         return view('register', [
    //             session()->setFlashdata('error', 'Korisničko ime mora biti između 5 i 16 slova i mora sadržati broj. Loznika mora da bude duga makar 7 simbola i da ukjučuje brojeve.'),
    //             'validation' => $this->validation
    //         ]);
    //     } else {
             
    //         $data = [
    //             'first_name' => openssl_encrypt($this->request->getPost('fName'), $this->cipher, $this->key, 0, $this->iv),
    //             'last_name' => openssl_encrypt($this->request->getPost('lName'), $this->cipher, $this->key, 0, $this->iv),
    //             'email' => openssl_encrypt($this->request->getPost('email'), $this->cipher, $this->key, 0, $this->iv),
    //             'username' => openssl_encrypt($this->request->getPost('username'), $this->cipher, $this->key, 0, $this->iv),
    //             'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             'user_type_id' => 3
    //         ];

    //         if($this->usersModel->where('username', $data['username'])->countAllResults() > 0) {
    //             session()->setFlashdata('error', 'Korisničko ime već postoji. Izaberite drugo ime.');
    //             return redirect()->to(base_url('register')); //treba izmjenit da se pojavi poruka o gresci   
    //         } else if($this->usersModel->where('email', $data['email'])->countAllResults() > 0) {
    //             session()->setFlashdata('error', 'E-mail adresa je zauzeta. Izaberite drugu adresu.');
    //             return redirect()->to(base_url('register')); //treba izmjenit da se pojavi poruka o gresci
    //         } else {
    //             $this->usersModel->insert($data);
    //             return redirect()->to(base_url('login'));
    //         }
    //     }
    // }


    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('login'));
        }

        $user = $this->usersModel->find($userId);
        $phoneNumber = $this->phoneNumbersModel->find($user['phone_number_id']);

        

        return view('profile', [
            'user' => $user,
            'phone_number' => $phoneNumber,
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
            return redirect()->back()->withInput()->with('error', $validationErrors);
            // return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        // Uzima vrijednosti korisnika i telefona
        $user = $this->usersModel->find($userId);
        $phoneNumber = $this->phoneNumbersModel->find($user['phone_number_id']);

        //Ovo sam stavio za log provjeru

        log_message('debug', 'User data before update: ' . print_r($user, true));
        log_message('debug', 'Phone number data before update: ' . print_r($phoneNumber, true));

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
        ];

        if ($this->request->getPost('new_password')) {
            $userData['password'] = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        }

        $phoneNumberData = [
            'phone_number' => openssl_encrypt($this->request->getPost('phone'), $this->cipher, $this->key, 0, $this->iv)
        ];

        // I ovdje stavljam debug logove

        log_message('debug', 'User data to update: ' . print_r($userData, true)); // Log user data to update
        log_message('debug', 'Phone number data to update: ' . print_r($phoneNumberData, true)); // Log phone number data to update


        // Da li uopste ima promjena?
        $hasUserDataChanges = array_diff_assoc($userData, array_intersect_key($user, $userData));
        $hasPhoneNumberChanges = array_diff_assoc($phoneNumberData, array_intersect_key($phoneNumber, $phoneNumberData));

        if (empty($hasUserDataChanges) && empty($hasPhoneNumberChanges)) {
            log_message('debug', 'Nema promjene u user data.');
            $session->setFlashdata('info', 'Nema promjena.');
            return redirect()->back()->withInput();
        }

        // Otvara konekciju sa bazom
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Update podataka korisnika
            $this->usersModel->update($userId, $userData);

            // Update telefona
            $this->phoneNumbersModel->update($user['phone_number_id'], $phoneNumberData);

            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                throw new \Exception('Transaction failed.');
            }

            $session->setFlashdata('success', 'Sva polja uspješno sačuvana!');
            return redirect()->to(base_url('profile'));
        } catch (\Exception $e) {
            $db->transRollback();

            log_message('error', $e->getMessage());

            $session->setFlashdata('error', 'Ažururanje nije uspjelo. Pokušajte ponovo.');
            return redirect()->to(base_url('profile'));
        }
    }
}
