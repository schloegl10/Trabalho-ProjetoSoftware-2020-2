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
    public function alteraDados() {
        $data = [];
        helper(['form']);
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/alteraDados', $data);
    }
    public function alteraOportunidade() {
        $data = [];
        helper(['form']);
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/alteraOportunidade', $data);
    }
    public function criaOportunidade() {
        $data = [];
        helper(['form']);
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/criaOportunidade', $data);
    }
}