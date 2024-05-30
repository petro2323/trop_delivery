<?php

namespace App\Controllers;

use App\Models\Users;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $usersModel;
    protected $key;
    protected $iv;
    protected $cipher;

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->key = \Config\Encryption::$key;
        $this->iv = \Config\Encryption::$iv;
        $this->cipher = \Config\Encryption::$cipher;
    }

    public function index()
    {
        $session = \Config\Services::session();
        if($session->has('username')) {
            return redirect()->to(base_url('/'));
        } else {
            return view('login');
        }
    }

    public function login()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $user = $this->usersModel->where('username', openssl_encrypt($data['username'], $this->cipher, $this->key, 0, $this->iv))->first();

        if($user != null && password_verify($data['password'], $user['password'])) {
            
            $session = \Config\Services::session();
            $session->set('username', $user['username']);
            $session->set('user_id', $user['id']);
            
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $this->erasecookie('deliveryAddress');
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function erasecookie($name)
    {
        setcookie($name, '', time() - 3600, '/');
    }
}
