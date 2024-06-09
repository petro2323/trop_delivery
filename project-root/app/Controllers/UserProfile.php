<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserProfile extends BaseController
{
    
    public function index()
    {
        $session = \Config\Services::session();
        if(!$session->has('username')) {
            return redirect()->to(base_url('/'));
        } else {
            return view('profile');
        }
    }

}
