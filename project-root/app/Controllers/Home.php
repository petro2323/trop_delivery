<?php

namespace App\Controllers;

use App\Models\Users;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users();
    }

    public function index(): string
    {
        return view('login');
    }

    public function login()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $user = $this->usersModel->where('username', $data['username'])->first();

        if($user != null && password_verify($data['password'], $user['password'])) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}
