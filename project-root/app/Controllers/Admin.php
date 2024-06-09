<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('user_type_id') == 1) {
            $users = new Users();
            $data['users'] = $users->getAllUsers();

            return view('privilege', $data);
        } else {
            return redirect()->to(base_url('/'));
        }
    }
}
