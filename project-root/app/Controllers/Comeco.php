<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
class Comeco extends Controller {
    public function index() {
        echo view('login');
    }
    public function cadastro() {
        $data =   [
            'est' => false,
            'emp' => false
        ];
        helper(['form']);
        if (($this->request->getMethod() == 'get') && (isset($_GET['estagiario']))) {
           $data['emp'] = false; 
           $data['est'] = true;
        }
        if (($this->request->getMethod() == 'get') && (isset($_GET['empresa']))) {
            $data['emp'] = true; 
            $data['est'] = false;
         }
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
            $rulesEmp = [
                'nome' => 'required',
                'email' => 'required|valid_email',
                'senha' => 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/[^0-9^A-Z^a-z]/]',
                'confsenha' => 'matches[senha]',
                'endereco' => 'required',
                'pessoaContato' => 'required',
                'descricao' => 'required'
            ];
            if($data['est'] = true) {
                if(! $this->validate($rulesEst)) {
                    $data['validation'] = $this-> validator;
                }  else {
                    $model = new UserModel();
                    $newData = [
                        'nome' => $this->request->getVar('nome'),
                        'email' => $this->request->getVar('email'),
                        'senha' => $this->request->getVar('senha'),
                        'confsenha' => $this->request->getVar('confsenha'),
                        'curso' => $this->request->getVar('curso'),
                        'ano' => $this->request->getVar('ano'),
                        'curriculo' => $this->request->getVar('curriculo'),
                    ];
                    $model->save($newData);
				    $session = session();
				    $session->setFlashdata('success', 'Successful Registration');
				    return redirect()->to('/');
                }
            } else if($data['emp'] = true) {
                if(! $this->validate($rulesEmp)) {
                    $data['validation'] = $this->validator;
                } else {

                    $newData = [
                        'nome' => $this->request->getVar('nome'),
                        'email' => $this->request->getVar('email'),
                        'senha' => $this->request->getVar('senha'),
                        'confsenha' => $this->request->getVar('confsenha'),                
                        'pessoaContato' => $this->request->getVar('pessoaContato'),
                        'descricao'=> $this->request->getVar('descricao'), 
                        'endereco' => $this->request->getVar('endereco'),
                    ];

                    $model->save($newData);
				    $session = session();
				    $session->setFlashdata('success', 'Successful Registration');
				    return redirect()->to('/');
                }   
            }
        }
        echo view('cadastro', $data);
    }
}
