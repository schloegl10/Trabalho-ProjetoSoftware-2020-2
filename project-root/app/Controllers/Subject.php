<?php
namespace App\Controllers;

interface Subject {
    public static function addObservador($newData);
    public static function removeObservador($idEstagiario, $idEmpresa);
    public static function notificaObservadores($minintegralizacao, $maxintegralizacao);
}