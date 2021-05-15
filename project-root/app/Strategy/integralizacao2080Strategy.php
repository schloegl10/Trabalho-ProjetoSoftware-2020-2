<?php

class integralizacao2080Strategy extends integralizacaoEstagiarioStrategy {
    public function getIntegralizacao() {
        $rulesEst = [
            'minIntegralizacao' => 'required|greater_than[20]',
            'maxIntegralizacao' => 'required|less_than[80]'
        ];
        return $ruleEst;
    }
}