<?php

class integralizacao4080Strategy extends integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'minIntegralizacao' => 'required|greater_than[40]',
            'maxIntegralizacao' => 'required|less_than[80]'
        ];
        return $ruleEst;
    }
}