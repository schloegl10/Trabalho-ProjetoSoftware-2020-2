<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
class Estagiario extends Controller {
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
                $listSegueEmp->where('idEst',  $userId)->where('idEmp', $this->request->getVar('idEmp'))->delete();
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
        $data['empresas'] = $empModel->findAll();
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
            $listSegueEmp->save($newData);
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
        $listSegueEmp = new listSegueEmp();
        $empModel = new empModel();
        $userId = $session->get('id');
        $data['oportunidades'] = $oportunidadeModel->findAll();
        for($i = 0; $i < count($data['oportunidades']); ++$i) {
            $data['oportunidades'][$i]['empresa'] = $empModel->find($data['oportunidades'][$i]['idemp']);
        }
           
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
        $data = [];
        helper(['form']);
        $session = session();
        $estModel = new estModel();
        $user = $estModel->find($session->get('id'));
        $data = ['user' => [
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
}