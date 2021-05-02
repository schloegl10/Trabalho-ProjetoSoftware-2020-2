<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Comeco extends Controller {
    public function index() {
        echo view('login');
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
                $email->setSubject('Sua conta no MOE foi criada');
                $email->setMessage($message);       
                $email->send();
                $email->printDebugger(['headers']);
                $estModel->save($newData);
			    $session->setFlashdata('success', 'Successful Registration');
               
               
				return redirect()->to('/avisoEmail');
            }
        }
        $this->calssData = $session->get();
        echo view('cadastroEst', $data);
    }

    public function cadastroEmp() {
        $data = [];
        $session = session();
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rulesEmp = [
                'nome' => 'required',
                'email' => 'required|valid_email',
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
                $email->printDebugger(['headers']);
                $empModel->save($newData);
				$session->setFlashdata('success', 'Successful Registration');
                $message = "Sua conta está pronta para uso";
                
				return redirect()->to('/avisoEmail');   
            }
        }
        $this->calssData = $session->get();
        echo view('cadastroEmp', $data);
    }
}
