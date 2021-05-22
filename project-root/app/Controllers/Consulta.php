<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
use App\Models\cursoModel;
use App\Strategy\integralizacao2080Strategy;
use App\Strategy\integralizacao4080Strategy;

class Consulta extends Controller {
    public static function listOportunidades() {
        $data = [];
        $session = session();
        $oportunidadeModel = new oportunidadeModel();
        $empModel = new empModel();
        $estModel = new estModel();
        $cursoModel = new cursoModel();
        $strategy;

        $userId = $session->get('id');
        $estagiario = $estModel->find($userId);
        $curso = $cursoModel->find($estagiario['curso']);

        if($curso['integralizacao'] == '2080') {
            $strategy = new integralizacao2080Strategy();
        } else {
            $strategy = new integralizacao4080Strategy();
        }
        $integralizacao = $strategy->getIntegralizacao();
        $oportunidades = $oportunidadeModel->findAll();
        $a = 0;
        for($i = 0; $i < count($oportunidades); $i++) {
            if($integralizacao['min'] <= $oportunidades[$i]['minintegralizacao'] && $integralizacao['max'] >= $oportunidades[$i]['maxintegralizacao']) {
                $oportunidades[$i]['empresa'] = $empModel->find($oportunidades[$i]['idemp']);
                $data['oportunidades'][$a] = $oportunidades[$i];
                $a = $a + 1;
            }
        } 
        return $data;
    }

    public static function listEstagiarios() {
        $session = session();
        $data = [];
        $listSegueEmp = new listSegueEmp();
        $empModel = new empModel();
        $cursoModel = new cursoModel();
        $userId = $session->get('id'); 
        $oportunidadeModel = new oportunidadeModel();
        $data['oportunidades'] = $oportunidadeModel->where('idemp', $userId)->find();
        $estModel = new estModel();
        $estagiarioIds = $listSegueEmp->where('idEmp',  $userId)->findAll();
        for($i = 0; $i < count($estagiarioIds); ++$i) {
            $data['estagiarios'][$i] = $estModel->find($estagiarioIds[$i]['idEst']);
            $data['estagiarios'][$i]['curso'] = $cursoModel->find($data['estagiarios'][$i]['curso'])['nome'];
        }
        for($i = 0; $i < count($data['oportunidades']); ++$i) {
            $data['oportunidades'][$i]['empresa'] = $empModel->find($data['oportunidades'][$i]['idemp']);
        }
        return $data;
    }   

    public static function listEmpresas() {
        $data = [];
        $empModel = new empModel();
        $data['empresas'] = $empModel->findAll();
        return $data;
    }
}