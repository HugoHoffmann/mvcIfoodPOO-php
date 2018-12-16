<?php

class ModelCliente{
    private $iCodigo;    
    private $sNome; 
    private $sCpf; 
    private $sDataNasc; 
    private $sTelefone; 
    private $sEmail; 
    private $sSenha; 
    private $sConfirmaSenha; 
    private $sCidade; 
    private $sBairro; 
    private $sRua; 
    private $iNumero; 
    private $sComplemento;



    function getICodigo() {
        return $this->iCodigo;
    }

    
    function getSNome() {
        return $this->sNome;
    }

    function getSCpf() {
        return $this->sCpf;
    }

    function getSDataNasc() {
        return $this->sDataNasc;
    }

    function getSTelefone() {
        return $this->sTelefone;
    }

    function getSEmail() {
        return $this->sEmail;
    }

    function getSSenha() {
        return $this->sSenha;
    }

    function getSConfirmaSenha() {
        return $this->sConfirmaSenha;
    }

    function getSCidade() {
        return $this->sCidade;
    }

    function getSBairro() {
        return $this->sBairro;
    }

    function getSRua() {
        return $this->sRua;
    }

    function getINumero() {
        return $this->iNumero;
    }

    function getSComplemento() {
        return $this->sComplemento;
    }

    function setICodigo($iCodigo) {
        $this->iCodigo = $iCodigo;
    }
    function setSNome($sNome) {
        $this->sNome = $sNome;
    }

    function setSCpf($sCpf) {
        $this->sCpf = $sCpf;
    }

    function setSDataNasc($sDataNasc) {
        $this->sDataNasc = $sDataNasc;
    }

    function setSTelefone($sTelefone) {
        $this->sTelefone = $sTelefone;
    }

    function setSEmail($sEmail) {
        $this->sEmail = $sEmail;
    }

    function setSSenha($sSenha) {
        $this->sSenha = $sSenha;
    }

    function setSConfirmaSenha($sConfirmaSenha) {
        $this->sConfirmaSenha = $sConfirmaSenha;
    }

    function setSCidade($sCidade) {
        $this->sCidade = $sCidade;
    }

    function setSBairro($sBairro) {
        $this->sBairro = $sBairro;
    }

    function setSRua($sRua) {
        $this->sRua = $sRua;
    }

    function setINumero($iNumero) {
        $this->iNumero = $iNumero;
    }

    function setSComplemento($sComplemento) {
        $this->sComplemento = $sComplemento;
    }


}

