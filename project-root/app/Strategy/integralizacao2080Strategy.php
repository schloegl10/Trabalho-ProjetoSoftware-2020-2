<?php
namespace App\Strategy;
use App\Strategy\integralizacaoEstagiarioStrategy;

class integralizacao2080Strategy implements  integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'min' => '20',
            'max' => '80'
        ];
        return $rulesEst;
    }
}