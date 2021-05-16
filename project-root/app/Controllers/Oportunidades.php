<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
class Oportunidades extends Controller {
    public static function criaOportunidade($request) {
        $listSegueEmp = new listSegueEmp();
        $estModel = new estModel();
        $oportunidadeModel = new oportunidadeModel();
        $session = session();
        $newData = [
            'idemp' => session()->get('id'),
            'minintegralizacao' => $request->getVar('minintegralizacao'),
            'maxintegralizacao' => $request->getVar('maxintegralizacao'),
            'curso' => $request->getVar('curso'),
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
        $oportunidadeModel = new oportunidadeModel();
        $session = session();
        $newData = [
            'id' => $session->get('idOp'),
            'idemp' => session()->get('id'),
            'minintegralizacao' => $request->getVar('minintegralizacao'),
            'maxintegralizacao' => $request->getVar('maxintegralizacao'),
            'curso' => $request->getVar('curso'),
            'remuneracao' => $request->getVar('remuneracao'),
            'horas' => $request->getVar('horas'),
            'descricao' => $request->getVar('descricao'),
            'atividades' => $request->getVar('atividades'),
            'habilidades' => $request->getVar('habilidades'),      
        ];
        $oportunidadeModel->save($newData);
    }
}