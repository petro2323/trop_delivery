<?php

namespace App\Controllers;
use App\Models\Users;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    
protected $usersModel;
protected $validation;

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->validation = \Config\Services::validation();
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
                'first_name' => $this->request->getPost('fName'),
                'last_name' => $this->request->getPost('lName'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
                'user_type_id' => 3
            ];

            if($this->usersModel->where('email', $data['email'])->countAllResults() > 0) {
                return redirect()->to(base_url('register')); //treba izmjenit da se pojavi poruka o gresci
            } else {
                $this->usersModel->insert($data);
                return redirect()->to(base_url('login'));
            }
        }
    }
    
}
