<?php
namespace App\Controllers;

interface Subject {
    public function addObservador($newData);
    public function removeObservador($idEstagiario, $idEmpresa);
    public function notificaObservadores();
}