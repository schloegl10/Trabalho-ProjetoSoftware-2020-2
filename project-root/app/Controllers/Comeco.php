<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
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
                      echo $senha; 
            if(!$estagiario && !$empresa) {
                $data['validation'] = $validation;
            } else if($estagiario && $senha != $estagiario['senha']) {
                $data['validation'] = $validation;
            } else if($empresa && $senha != $empresa['senha']) {
                $data['validation'] = $validation;
            } else if($estagiario && $senha == $estagiario['senha']) {
                
                $this->setUserSession($estagiario, true);
                return redirect()->to('/Home/Estagiario');
            } else if($empresa && $senha == $empresa['senha']) {
                $this->setUserSession($empresa, false);
                return redirect()->to('/Home/Empresa');
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
            'isEstagiario' => $estagiarioBool
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
                $estModel = new estModel();
                $newData = [
                    'nome' => $this->request->getVar('nome'),
                    'email' => $this->request->getVar('email'),
                    'senha' => $this->request->getVar('senha'),
                    'curso' => $this->request->getVar('curso'),
                    'ano' => $this->request->getVar('ano'),
                    'curriculo' => $this->request->getVar('curriculo'),
                ];

                $email = \Config\Services::email();
                $message = "Sua conta está pronta para uso";
                $email->setTo($newData['email']);
                $email->setFrom('schl0egly0utube100@gmail.com', 'Your Name');    
                $email->setSubject('Sua conta no MOE foi criada');
                $email->setMessage($message);   
                $email->send();
                $estModel->save($newData);
			    $session->setFlashdata('success', 'Successful Registration');
               
               
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
                $empModel = new empModel();
                $newData = [
                    'nome' => $this->request->getVar('nome'),
                    'email' => $this->request->getVar('email'),
                    'senha' => $this->request->getVar('senha'),
                    'pessoaContato' => $this->request->getVar('pessoaContato'),
                    'descricao'=> $this->request->getVar('descricao'),                         
                    'endereco' => $this->request->getVar('endereco'),
                ];
                $email = \Config\Services::email();
                $email->setFrom('schloegl10@hotmail.com', 'Conformação de conta criada');
                $email->setTo($newData['email']);
                $email->setSubject('Sua conta no MOE foi criada e está pronta para ser usada.| MOE');
                $email->setMessage($message);       
                $email->send();
                $empModel->save($newData);
				$session->setFlashdata('success', 'Successful Registration');
                $message = "Sua conta está pronta para uso";
                
				return redirect()->to('/avisoEmail');   
            }
        }
        echo view('cadastroEmp', $data);
    }
}
