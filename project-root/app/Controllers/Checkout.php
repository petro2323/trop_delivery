<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Checkout extends BaseController
{
    public function index()
    {
        return view("checkout");
    }
}
