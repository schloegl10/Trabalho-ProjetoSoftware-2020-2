<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Home extends Controller {
    public function homeEst() {
        $data = [];
        helper(['form']);
        echo view('HomeEst', $data);
    }
    public function homeEmp() {
        $data = [];
        helper(['form']);
        echo view('HomeEmp', $data);
    }
}