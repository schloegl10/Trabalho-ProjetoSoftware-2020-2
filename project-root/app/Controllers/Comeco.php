<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Comeco extends Controller {

	public function index() {
        echo view('login');
    }
    public function cadastro() {
        echo view('cadastro');
    }
}
