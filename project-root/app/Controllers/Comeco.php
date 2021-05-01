<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Comeco extends Controller {
    protected $session = [
        'est' => false,
        'emp' => false
    ];
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
           $this->session = $data;
        }
        if (($this->request->getMethod() == 'get') && (isset($_GET['empresa']))) {
            $data['emp'] = true; 
            $data['est'] = false;
            $this->session = $data;
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
                'senha' => 'required|min_length[6]|regex_match[A-Z]|regex_match[0-9]|regex_match[^0-9^A-Z^a-z^ ]',
                'confsenha' => 'matches[senha]',
                'endereco' => 'required',
                'pessoaContato' => 'required',
                'descricao' => 'required'
            ];
            if($data['est'] = true) {
                if(! $this->validate($rulesEst)) {
                    $data['validation'] = $this-> validator;
                }  else {
                    //add est    
                }
            } else if($data['emp'] = true) {
                if(! $this->validate($rulesEmp)) {
                    $data['validation'] = $this->validator;
                } else {
                    //add emp    
                }   
            }
        }
        echo view('cadastro', $data);
    }
}
