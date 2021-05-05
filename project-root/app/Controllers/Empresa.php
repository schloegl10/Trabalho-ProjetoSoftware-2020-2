<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
class Empresa extends Controller {
    public function homeEmp() {
        $data = [];
        helper(['form']);
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
                $data['oportunidadeSelec']['empresa'] = $empModel->find($data['oportunidadeSelec']['idemp']);
                $data['oportunidadeSelec']['nomeEmp'] = $data['oportunidadeSelec']['empresa']['nome'];
            }
        }
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/HomeEmp', $data);
    }
    public function alteraDados() {
        $data = [];
        helper(['form']);
        $data = [];
        helper(['form']);
        $session = session();
        $empModel = new empModel();
        $user = $empModel->find($session->get('id'));
        $data = ['user' => [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'senha' => $user['senha'],
            'email' => $user['email'],
            'endereco' => $user['endereco'],
            'pessoaContato' => $user['pessoaContato'],
            'descricao' => $user['descricao'],
        ]];
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'nome' => 'required',
                'email' => 'required|valid_email',
                //'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                //'confsenha' => 'matches[senha]',
                'endereco' => 'required',
                'pessoaContato' => 'required',
                'descricao' => 'required'
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            }  else {
                Usuario::alteraEmpresa($this->request);
                return redirect()->to('/Empresa/AlteraDados');
            }
        }
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