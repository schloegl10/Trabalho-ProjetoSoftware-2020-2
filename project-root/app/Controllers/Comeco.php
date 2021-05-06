<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
use App\Controllers\Usuario;
class Comeco extends Controller {
    public function index() {
        $data = [];
        $session = session();
        
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'min_length[6]|max_length[3]',
                'senha' => 'min_length[6]|max_length[3]'
                ];
            if(! $this->validate($rules)) {
                $validation = $this-> validator;
            }
            $senha =  $this->request->getVar('senha');
            $estModel = new estModel();
            $empModel = new empModel();
            $estagiario = $estModel-> where('email',  $this->request->getVar('email'))
                      ->first();
            $empresa = $empModel-> where('email', $this->request->getVar('email'))
                      ->first();
            if(!$estagiario && !$empresa) {
                $data['validation'] = $validation;
            } else if($estagiario && $senha != $estagiario['senha']) {
                $data['validation'] = $validation;
            } else if($empresa && $senha != $empresa['senha']) {
                $data['validation'] = $validation;
            } else if($estagiario && $senha == $estagiario['senha']) {
                if($estagiario['autenticado'] == 't') {
                $this->setUserSession($estagiario, 1);
                return redirect()->to('/Estagiario/Home');
                }
            } else if($empresa && $senha == $empresa['senha']) {
                if($estagiario['autenticado']  == 't') {
                $this->setUserSession($empresa, 0);
                return redirect()->to('/Empresa/Home');
                }
            } 
        }
        echo view('login', $data);
    }

    private function setUserSession($user, $estagiarioBool) {
        $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'nome' => $user['nome'],
            'isLoggedIn' =>true,
            'isEstagiario' => $estagiarioBool,
            'idEmp' => 0,
        ];

        session()->set($data);
        return true;
    }

    public function cadastro() {
        echo view('cadastro');
    }
    public function avisoEmail() {
        echo view('avisoEmail');
    }
    public function cadastroEst() {
        $data = [];
        $session = session();
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rulesEst = [
                'nome' => 'required',
                'email' => 'required|valid_email|is_unique[Estagiario.email]|is_unique[Empresa.email]',
                'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                'confsenha' => 'matches[senha]',
                'curso' => 'required',
                'ano' => 'required|numeric',
                'curriculo' => 'required'
            ];
            if(! $this->validate($rulesEst)) {
                $data['validation'] = $this-> validator;
            }  else {
                Usuario::criaEstagiario($this->request);
                return redirect()->to('/avisoEmail');
            }
        }
        echo view('cadastroEst', $data);
    }

    public function cadastroEmp() {
        $data = [];
        $session = session();
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rulesEmp = [
                'nome' => 'required',
                'email' => 'required|valid_email|is_unique[Estagiario.email]|is_unique[Empresa.email]',
                'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                'confsenha' => 'matches[senha]',
                'endereco' => 'required',
                'pessoaContato' => 'required',
                'descricao' => 'required'
            ];
            if(! $this->validate($rulesEmp)) {
                $data['validation'] = $this->validator;
            } else {
                Usuario::criaEmpresa($this->request);
                return redirect()->to('/avisoEmail');
            }
        }
        echo view('cadastroEmp', $data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}
