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
            'autenticado' => 'f',
        ];
        $from = "schloegl10@discente.ufg.br";
        $to = $newData['email'];
        $subject = "Sua conta no MOE foi criada";
        $message = "Para autenticar a conta acesse o link: http://localhost:8080/Usuario/autenticaest/".$request->getVar('email')."/".$request->getVar('senha');
        $headers = [ "From: $from" ];
        mail( $to, $subject, $message, implode( '\r\n', $headers ) );
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
            'autenticado' => 'f',
        ];
        $from = "schloegl10@discente.ufg.br";
        $to = $newData['email'];
        $subject = "Sua conta no MOE foi criada";
        $message = "Para autenticar a conta acesse o link: http://localhost:8080/Usuario/autenticaemp/".$request->getVar('email')."/".$request->getVar('senha');
        $headers = [ "From: $from" ];
        mail( $to, $subject, $message, implode( '\r\n', $headers ) );
        $empModel->save($newData);
               
    }
    public static function alteraEstagiario($request) {
        $estModel = new estModel();
        $newData = [
            'id' => session()->get('id'),
            'nome' => $request->getVar('nome'),
            'email' => $request->getVar('email'),
            'senha' => $request->getVar('senha'),
            'curso' => $request->getVar('curso'),
            'ano' => $request->getVar('ano'),
            'curriculo' => $request->getVar('curriculo'),
        ];

        $estModel->save($newData);
    }
    public static function alteraEmpresa($request) {
        $empModel = new empModel();
        $newData = [
            'id' => session()->get('id'),
            'nome' => $request->getVar('nome'),
            'email' => $request->getVar('email'),
            'senha' => $request->getVar('senha'),
            'pessoaContato' => $request->getVar('pessoaContato'),
            'descricao' => $request->getVar('descricao'),
            'endereco' => $request->getVar('endereco'),
        ];

        $empModel->save($newData);
    }

    public function autenticaest($email, $senha) {
        $estModel = new estModel();
        $estagiario = $estModel-> where('email',  $email)
        ->first();
        if($senha == $estagiario['senha']) {
            $data = [
                'autenticado' => 't'
            ];
            $estModel->update($estagiario['id'], $data);
        } 
        return redirect()->to('/');
    }
    public function autenticaemp($email, $senha) {
        $empModel = new empModel();
        $empresa = $empModel->where('email', $email)
        ->first();
        if($senha == $empresa['senha']) {
            $data = [
                'autenticado' => 't'
            ];
            $empModel->update($empresa['id'], $data);
        }
        return redirect()->to('/');
    }
}