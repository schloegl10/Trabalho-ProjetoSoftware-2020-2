<?php
namespace App\Strategy;
use App\Strategy\integralizacaoEstagiarioStrategy;

class integralizacao4080Strategy implements  integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'min' => '40',
            'max' => '80'
        ];
        return $rulesEst;
    }
}