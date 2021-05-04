<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Estagiario extends Controller {
    public function homeEst() {
        $data = ['empresas' => ['aa' => 'aa'],
        ];
        $session = session();
        $userId = $session->get('id');
        $estModel = new estModel();
        helper(['form']);
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/HomeEst', $data);
    }
    public function alteraDados() {
        $data = [];
        helper(['form']);
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/alteraDados', $data);
    }
}