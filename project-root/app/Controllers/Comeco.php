<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Comeco extends Controller {
    protected $classData =   [
        'est' => false,
        'emp' => false
    ];
    public function index() {
        echo view('login');
    }
    public function cadastro() {
        $session = session();
        $session->set($this->classData);
        $data = $session->get();
        helper(['form']);
        if (($this->request->getMethod() == 'get') && (isset($_GET['estagiario']))) {
           $data['emp'] = false; 
           $data['est'] = true;
           $session->set($data);
        }
        if (($this->request->getMethod() == 'get') && (isset($_GET['empresa']))) {
            $data['emp'] = true; 
            $data['est'] = false;
            $session->set($data);
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
            if($data['est']) {
                $this->classData = [
                    'est' => true,
                    'emp' => false
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
                    $estModel->save($newData);
				    $session->setFlashdata('success', 'Successful Registration');
				    return redirect()->to('/');
                }
            } else if($data['emp']) {
                $this->classData = [
                    'est' => false,
                    'emp' => true
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

                    $empModel->save($newData);
				    $session->setFlashdata('success', 'Successful Registration');
				    return redirect()->to('/');
                }   
            }
        }
        $this->calssData = $session->get();
        echo view('cadastro', $data);
    }
}
