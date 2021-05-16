<?php
namespace App\Strategy;
use App\Strategy\integralizacaoEstagiarioStrategy;

class integralizacao2080Strategy implements  integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'minintegralizacao' => 'required|greater_than[20]',
            'maxintegralizacao' => 'required|less_than[80]'
        ];
        return $rulesEst;
    }
}