<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\estModel;
use App\Models\listSegueEmp;
use App\Models\oportunidadeModel;
class Oportunidades extends Controller {
    public static function criaOportunidade($request) {
        $estModel = new estModel();
        $oportunidadeModel = new oportunidadeModel();
        $session = session();
        $newData = [
            'idemp' => session()->get('id'),
            'minintegralizacao' => $request->getVar('minintegralizacao'),
            'maxintegralizacao' => $request->getVar('maxintegralizacao'),
            'remuneracao' => $request->getVar('remuneracao'),
            'horas' => $request->getVar('horas'),
            'descricao' => $request->getVar('descricao'),
            'atividades' => $request->getVar('atividades'),
            'habilidades' => $request->getVar('habilidades'),      
        ];
        $oportunidadeModel->save($newData);
        
    }
    public static function alteraOportunidade($request) {
        $oportunidadeModel = new oportunidadeModel();
        $session = session();
        $newData = [
            'id' => $session->get('idOp'),
            'idemp' => session()->get('id'),
            'minintegralizacao' => $request->getVar('minintegralizacao'),
            'maxintegralizacao' => $request->getVar('maxintegralizacao'),
            'remuneracao' => $request->getVar('remuneracao'),
            'horas' => $request->getVar('horas'),
            'descricao' => $request->getVar('descricao'),
            'atividades' => $request->getVar('atividades'),
            'habilidades' => $request->getVar('habilidades'),      
        ];
        $oportunidadeModel->save($newData);
    }
}