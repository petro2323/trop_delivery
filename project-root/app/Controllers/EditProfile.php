<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EditProfile extends BaseController
{
    public function index()
    {
        return view("profile");
    }
}
