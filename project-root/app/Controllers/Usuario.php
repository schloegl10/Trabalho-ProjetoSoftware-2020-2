<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\empModel;
class Usuario extends Controller {
    public static function criaEstagiario($request) {
            $estModel = new estModel();
            $newData = [
                'nome' => $request->getVar('nome'),
                'email' => $request->getVar('email'),
                'senha' => $request->getVar('senha'),
                'curso' => $request->getVar('curso'),
                'ano' => $request->getVar('ano'),
                'curriculo' => $request->getVar('curriculo'),
            ];

            $email = \Config\Services::email();
            $message = "Sua conta está pronta para uso";
            $email->setTo($newData['email']);
            $email->setFrom('schl0egly0utube100@gmail.com', 'Your Name');    
            $email->setSubject('Sua conta no MOE foi criada');
            $email->setMessage($message);   
            $email->send();
            $estModel->save($newData);
    }
    public static function criaEmpresa($request) {
        
            $empModel = new empModel();
            $newData = [
                'nome' => $request->getVar('nome'),
                'email' => $request->getVar('email'),
                'senha' => $request->getVar('senha'),
                'pessoaContato' => $request->getVar('pessoaContato'),
                'descricao'=> $request->getVar('descricao'),                         
                'endereco' => $request->getVar('endereco'),
            ];
            $message = "Sua conta está pronta para uso";
            $email = \Config\Services::email();
            $email->setFrom('schloegl10@hotmail.com', 'Conformação de conta criada');
            $email->setTo($newData['email']);
            $email->setSubject('Sua conta no MOE foi criada e está pronta para ser usada.| MOE');
            $email->setMessage($message);       
            $email->send();
            $empModel->save($newData);
            $message = "Sua conta está pronta para uso";
               
    }
    public function alteraEstagiario($request) {

    }
    public function alteraEmpresa($request) {

    }
}