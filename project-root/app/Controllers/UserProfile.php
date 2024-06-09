<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class UserProfile extends BaseController
{
    
    public function index()
    {
        $session = \Config\Services::session();
        if ($session->has('username')) {
            $user = new Users();
            $data['user_data'] = $user->getUserData($session->get('user_id'));

            return view('profile', $data);
        } else {
            return redirect()->to(base_url('/'));
        }
    }

}
