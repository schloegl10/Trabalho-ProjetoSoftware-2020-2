<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Comeco extends Controller {
    
	public function index() {
        echo view('login');
    }
    public function cadastro() {
        $data = [
            'est' => NULL,
            'emp' => NULL
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
            $rules = [
                'nome' => 'required',
                'email' => 'required|valid_email',
                'senha' => 'required|min_length[6]|regex_match[A-Z]|regex_match[0-9]|regex_match[^0-9^A-Z^a-z^ ]',
                'confsenha' => 'matches[senha]'
            ];
            $rulesEst = [
                'curso' => 'required',
                'ano' => 'required|numeric',
                'curric' => 'required'
            ];
            $rulesEmp = [
                'endereco' => 'required',
                'pessoaContato' => 'required',
                'descricao' => 'required'
            ];  
            if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
            if($data['est']) {
                if((! $this->validate($rules)) || (! $this->validate($rulesEst))) {
                    $data['validation'] = $this-> validator;
                }  else {
                    //add est    
                }
            } else if($data['emp']) {
                if((! $this->validate($rules)) || (! $this->validate($rulesEmp))) {
                    $data['validation'] = $this->validator;
                } else {
                    //add emp    
                }   
            }
        }
        echo view('cadastro', $data);
    }
}
