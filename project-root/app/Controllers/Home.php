<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Home extends Controller {
    public function homeEst() {
        echo view('HomeEst');
    }
    public function homeEmp() {
        echo view('HomeEmp');
    }
}