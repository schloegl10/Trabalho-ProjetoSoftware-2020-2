<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
use App\Models\cursoModel;
use App\Controllers\Oportunidades;
use App\Controllers\Estagiario;
use App\Strategy\integralizacao2080Strategy;
use App\Strategy\integralizacao4080Strategy;
use App\Controllers\Subject;
class Empresa extends Controller implements Subject {

    public function homeEmp() {
        $data = [];
        helper(['form']);
        $session = session();
        $oportunidadeModel = new oportunidadeModel();
        $listSegueEmp = new listSegueEmp();
        $empModel = new empModel();
        $cursoModel = new cursoModel();
        $userId = $session->get('id'); 
        $data['oportunidades'] = $oportunidadeModel->where('idemp', $userId)->find();
        $estModel = new estModel();
        $estagiarioIds = $listSegueEmp->where('idEmp',  $userId)->findAll();
        $estagiarioNaLista = false;
        $data = Consulta::listEstagiarios();
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'idEmp' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
                $data['validationOp'] = $this-> validator;
            } else {  
                if(null !== $oportunidadeModel->where('idemp', $userId)->find($this->request->getVar('idEmp')))  {
                    $data['oportunidadeSelec'] =  $oportunidadeModel->where('idemp', $userId)->find($this->request->getVar('idEmp'));
                    $data['oportunidadeSelec']['empresa'] = $empModel->find($userId);
                    $data['oportunidadeSelec']['nomeEmp'] = $data['oportunidadeSelec']['empresa']['nome'];
                }
            }
        }

        if ($this->request->getMethod() == 'get') {
            $rulesEst = [
                'idEst' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
                $data['validationEst'] = $this-> validator;
            } else {  
                for($i = 0; $i < count($data['estagiarios']); ++$i) {
                    if($this->request->getVar('idEst') == $data['estagiarios'][$i]['id']) {
                        $estagiarioNaLista = true;
                    }
                }
                if($estagiarioNaLista) {
                    if(null !== $estModel->find($this->request->getVar('idEst')))  {
                        $data['estagSelec'] =  $estModel->find($this->request->getVar('idEst'));
                        $data['estagSelec']['curso'] = $cursoModel->find($data['estagSelec']['curso'])['nome'];
                    }
                }
            }
        }
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/HomeEmp', $data);
    }
    public function alteraDados() {
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
                'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                'confsenha' => 'matches[senha]',
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
        $session = session();
        $oportunidadeModel = new oportunidadeModel();
        $data = ['oportunidade' => [
            'id' => '',
            'remuneracao' => '',
            'horas' => '',
            'habilidades' => '',
            'atividades' => '',
            'descricao' => '',
            'minintegralizacao' => '',
            'maxintegralizacao' => '',
        ]];
        if ($this->request->getMethod() == 'get') {
            $rulesEst = [
                'idOp' => 'required',
            ];
            if(! $this->validate($rulesEst)) {
            } else {  
                $oportu = $oportunidadeModel->find($this->request->getVar('idOp'));
                $session->set('idOp', $this->request->getVar('idOp'));
                $data = ['oportunidade' => [
                    'id' => $this->request->getVar('idOp'),
                    'minintegralizacao' => $oportu['minintegralizacao'],
                    'maxintegralizacao' => $oportu['maxintegralizacao'],
                    'remuneracao' => $oportu['remuneracao'],
                    'horas' => $oportu['horas'],
                    'habilidades' => $oportu['habilidades'],
                    'atividades' => $oportu['atividades'],
                    'descricao' => $oportu['descricao'],
                ]];
            }
        }
        if ($this->request->getMethod() == 'post') {
            $rulesOp = [
                'remuneracao' => 'required|numeric|greater_than[1000]',
                'horas' => 'required|numeric',
                'descricao' => 'required',
                'atividades' => 'required',
                'habilidades' => 'required',
                'minintegralizacao' => 'required|greater_than[0]',
                'maxintegralizacao' => 'required|less_than[100]'
            ];
            if(! $this->validate($rulesOp)) {
                $data['validation'] = $this-> validator;
            }  else {
                Oportunidades::alteraOportunidade($this->request);
                Empresa::notificaObservadores($this->request->getVar('minintegralizacao'), $this->request->getVar('maxintegralizacao'));
                return redirect()->to('/Empresa/alteraOportunidade');
            }
        }
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/alteraOportunidade', $data);
    }

    public function criaOportunidade() {
        $data = [];
        $session = session();
        $estModel = new estModel();
        $listSegueEmp = new listSegueEmp();
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rulesOp = [
                'remuneracao' => 'required|numeric|greater_than[1000]',
                'horas' => 'required|numeric',
                'descricao' => 'required',
                'atividades' => 'required',
                'habilidades' => 'required',
                'minintegralizacao' => 'required|greater_than[0]',
                'maxintegralizacao' => 'required|less_than[100]'
            ];
            if(! $this->validate($rulesOp)) {
                $data['validation'] = $this->validator;
            } else {
                $oportunidadeModel = new oportunidadeModel();
                Oportunidades::criaOportunidade($this->request);
                Empresa::notificaObservadores($this->request->getVar('minintegralizacao'), $this->request->getVar('maxintegralizacao'));
                return redirect()->to('/Empresa/Home');
            }
        }
        echo view('/Empresa/EmpresaHeader');
        echo view('/Empresa/criaOportunidade', $data);
    }

    public static function addObservador($newData) {
        $listSegueEmp = new listSegueEmp();
        $listSegueEmp->save($newData);
    }

    public static function removeObservador($idEstagiario, $idEmpresa) {
        $listSegueEmp = new listSegueEmp();
        $listSegueEmp->where('idEst',  $idEstagiario)->where('idEmp', $idEmpresa)->delete();
    }

    public static function notificaObservadores($minintegralizacao, $maxintegralizacao) {
        $estModel = new estModel();
        $listSegueEmp = new listSegueEmp();
        $cursoModel = new cursoModel();
        $estagiariosIds = $listSegueEmp->where('idEmp', session()->get('id'))->findAll();
        for($i = 0; $i < count($estagiariosIds); ++$i) {
            $seguidores[$i] = $estModel->find($estagiariosIds[$i]['idEst']);
        }
        $seguidoresEstrategiaValida = [];
        $curso;
        $strategy;
        foreach($seguidores as $seguidor) {
            $curso = $cursoModel->find($seguidor['curso']);
            if($curso['integralizacao'] == '2080') {
                $strategy = new integralizacao2080Strategy();
            } else {
                $strategy = new integralizacao4080Strategy();
            }
            $integralizacao = $strategy->getIntegralizacao();
            if($integralizacao['min'] <= $minintegralizacao && $integralizacao['max'] >= $maxintegralizacao) {
                array_push($seguidoresEstrategiaValida, $seguidor);          
            }
        }
        
        foreach($seguidoresEstrategiaValida as $seguidor) {
            Estagiario::notifica($seguidor);
        }
    }
}