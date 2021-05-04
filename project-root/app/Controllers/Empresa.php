<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Empresa extends Controller {
    public function homeEmp() {
        $data = [];
        helper(['form']);
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/HomeEmp', $data);
    }
}