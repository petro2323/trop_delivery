<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EditPrivilege extends BaseController
{
    public function index()
    {
        return view("privilege");
    }
}
