<?php

namespace App\Controllers;
use App\Models\Users;
use App\Config\Encryption;

use App\Controllers\BaseController;

class Register extends BaseController
{
    
protected $usersModel;
protected $validation;
protected $key;
protected $iv;
protected $cipher;

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->validation = \Config\Services::validation();
        $this->key = \Config\Encryption::$key;
        $this->iv = \Config\Encryption::$iv;
        $this->cipher = \Config\Encryption::$cipher;
    }
    
    public function index()
    {
        return view('register');
    }

    public function register()
    {
        $this->validation->setRuleGroup('rules');

        if(!$this->validation->run($this->request->getPost(), 'rules')) {
            return view('register', [
                'validation' => $this->validation
            ]); //treba izmjenit da se pojavi poruka o gresci
        } else {
             
            $data = [
                'first_name' => openssl_encrypt($this->request->getPost('fName'), $this->cipher, $this->key, 0, $this->iv),
                'last_name' => openssl_encrypt($this->request->getPost('lName'), $this->cipher, $this->key, 0, $this->iv),
                'email' => openssl_encrypt($this->request->getPost('email'), $this->cipher, $this->key, 0, $this->iv),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
                'user_type_id' => 3
            ];

            if($this->usersModel->where('username', $data['username'])->countAllResults() > 0) {
                return redirect()->to(base_url('register')); //treba izmjenit da se pojavi poruka o gresci   
            } else if($this->usersModel->where('email', $data['email'])->countAllResults() > 0) {
                return redirect()->to(base_url('register')); //treba izmjenit da se pojavi poruka o gresci
            } else {
                $this->usersModel->insert($data);
                return redirect()->to(base_url('login'));
            }
        }
    }
    
}
