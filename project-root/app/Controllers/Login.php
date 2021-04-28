<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Login extends Controller {

	public function index() {
        $data = [];
        echo view('login', $data);
    }
}
