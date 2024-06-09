<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('user_type_id') == 1) {
            return view('privilege');
        } else {
            return redirect()->to(base_url('/'));
        }
    }
}
