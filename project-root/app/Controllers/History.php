<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserFood;

class History extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        if($session->has('username')) {
            $userFood = new UserFood();
            $data['history'] = $userFood->getUserHistoryInfo($session->get('user_id'));

            return view('history', $data);
        } else {
            return redirect()->to(base_url('/'));
        }
    }
}
