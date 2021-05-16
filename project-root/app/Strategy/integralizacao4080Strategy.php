<?php
namespace App\Strategy;
use App\Strategy\integralizacaoEstagiarioStrategy;

class integralizacao4080Strategy implements  integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'minintegralizacao' => 'required|greater_than[40]',
            'maxintegralizacao' => 'required|less_than[80]'
        ];
        return $rulesEst;
    }
}