<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
class Usuario extends Controller {
    public static function criaOportunidade($request) {
        $newData = [
            'idemp' => session()->get('id'),
            'semestre' => $request->getVar('semestre'),
            'remuneracao' => $request->getVar('remuneracao'),
            'horas' => $request->getVar('horas'),
            'descricao' => $request->getVar('descricao'),
            'atividades' => $request->getVar('atividades'),
            'habilidades' => $request->getVar('habilidades'),      
        ];
        $estagiariosIds = $listSegueEmp->where('idEmp', session()->get('id'))->findAll();
        for($i = 0; $i < count($estagiariosIds); ++$i) {
            $seguidores[$i] = $estModel->find($estagiariosIds[$i]['idEst']);
        }
        $oportunidadeModel->save($newData);
         foreach($seguidores as $seguidor) {
             $message = "A empresa".$session->get('nome')."criou uma nova oportunidade de estágio vá lá ver";
             $email = \Config\Services::email();
             $email->setFrom('schloegl10@hotmail.com', 'MOE');
             $email->setTo($seguidor['email']);
             $email->setSubject('Nova oportunidade de estágio| MOE');
             $email->setMessage($message);       
             $email->send();
         }
    }
    public static function alteraOportunidade($request) {
        $sessuib = session();
        $newData = [
            'id' => $session->get('idOp'),
            'idemp' => session()->get('id'),
            'semestre' => $request->getVar('semestre'),
            'remuneracao' => $request->getVar('remuneracao'),
            'horas' => $request->getVar('horas'),
            'descricao' => $request->getVar('descricao'),
            'atividades' => $request->getVar('atividades'),
            'habilidades' => $request->getVar('habilidades'),      
        ];
        $oportunidadeModel->save($newData);
    }
}