<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Welcome extends Controller
{
    public function index()
    {
        // Load the view called 'dashboard.php'
        return view('dashboard');
    }
}