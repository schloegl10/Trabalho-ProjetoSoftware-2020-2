<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Models\cursoModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
use App\Controllers\Observer;
use App\Controllers\Empresa;
use App\Controllers\Consulta;

class Estagiario extends Controller implements Observer  {

    public function homeEst() {
        $data = ['empresas' => [],
        ];
        $session = session();
        $userId = $session->get('id');
        $listSegueEmp = new listSegueEmp();
        $empModel = new empModel();
        $empresasIds = $listSegueEmp-> where('idEst',  $userId)->findAll();
        for($i = 0; $i < count($empresasIds); ++$i) {
            $data['empresas'][$i] = $empModel->find($empresasIds[$i]['idEmp']);
        }
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'idEmp' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            } else {
                Empresa::removeObservador($userId, $this->request->getVar('idEmp'));
                return redirect()->to('/Estagiario/Home');
            }
        }
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/HomeEst', $data);
    }

    public function ListEmpresas() {
        $data = [];
        helper(['form']);
        $session = session();
        $empModel = new empModel();
        $listSegueEmp = new listSegueEmp();
        $userId = $session->get('id');
        $data['empresas'] = Consulta::listEmpresas()['empresas'];
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'idEmp' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            } else {
                $data['empresaSelec'] =  $empModel->find($this->request->getVar('idEmp'));
                $id = $data['empresaSelec']['id'];
                session()->set('idEmp', $id);
            }
        }
        
        if ($this->request->getMethod() == 'get' && $session->get('idEmp') !== 0) {
            $newData = [
                 'idEst' => $userId,
                 'idEmp' =>  $session->get('idEmp'),
            ];
            Empresa::addObservador($newData);
            session()->set('idEmp', 0);
            return redirect()->to('/Estagiario/buscaEmpresas');
        }
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/ListEmpresas', $data);
    }

    public function ListOportunidades() {
        $data = [];
        helper(['form']);
        $session = session();
        $oportunidadeModel = new oportunidadeModel();
        
        $data = Consulta::listOportunidades();
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'idEmp' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            } else {
                $data['oportunidadeSelec'] =  $oportunidadeModel->find($this->request->getVar('idEmp'));
            }
        }
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/ListOportunidades', $data);
    }

    public function alteraDados() {
        $cursoModel = new cursoModel();
        $curso = $cursoModel->findAll();
        helper(['form']);
        $session = session();
        $estModel = new estModel();
        $cursoModel = new cursoModel();
        $user = $estModel->find($session->get('id'));
        $data = [
            'cursos' => $curso,
            'user' => [
                'id' => $user['id'],
                'nome' => $user['nome'],
                'senha' => $user['senha'],
                'email' => $user['email'],
                'ano' => $user['ano'],
                'curso' => $user['curso'],
                'curriculo' => $user['curriculo'],
        ]];
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'nome' => 'required',
                'email' => 'required|valid_email',
                'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                'confsenha' => 'matches[senha]',
                'curso' => 'required',
                'ano' => 'required|numeric',
                'curriculo' => 'required'
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            }  else {
                Usuario::alteraEstagiario($this->request);
                return redirect()->to('/Estagiario/AlteraDados');
            }
        }
        echo view('/Estagiario/EstagioHeader');
        echo view('/Estagiario/alteraDados', $data);
    }

    public static function notifica($estagiario) {
        $session = session();
        $message = "A empresa ".$session->get('nome')." criou uma nova oportunidade de estágio vá lá ver";

        $from = "schloegl10@discente.ufg.br";
        $to = $estagiario['email'];
        $subject = "Nova oportunidade de estágio| MOE";
        $headers = [ "From: $from" ];
        mail( $to, $subject, $message, implode( '\r\n', $headers ) );
    }
}