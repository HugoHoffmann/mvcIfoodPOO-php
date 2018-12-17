<?php

class ModelLogin{
    private $iCodigo;    
    private $sEmail; 
    private $sSenha; 



    function getICodigo() {
        return $this->iCodigo;
    }

    function getSEmail() {
        return $this->sEmail;
    }

    function getSSenha() {
        return $this->sSenha;
    }

    function setICodigo($iCodigo) {
        $this->iCodigo = $iCodigo;
    }
    function setSEmail($sEmail) {
        $this->sEmail = $sEmail;
    }

    function setSSenha($sSenha) {
        $this->sSenha = $sSenha;
    }

}

