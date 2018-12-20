<?php

class ModelResaurantes{
    private $iCodigo;    
    private $sNome;
    private $sCnpj ;
    private $sEmail ;
    private $sSenha ;
    private $sCidade; 
    private $sBairro; 
    private $sRua; 
    private $iNumero; 
    private $sComplemento;
    private $fLatitude;
    private $fLongitude;
    private $sFormaPagamento;
    private $sDescricao;
    
    function getICodigo() {
        return $this->iCodigo;
    }

    function setICodigo($iCodigo) {
        $this->iCodigo = $iCodigo;
    }
    
    function getSEmail() {
        return $this->sEmail;
    }

    function getSSenha() {
        return $this->sSenha;
    }


    function getSNome() {
        return $this->sNome;
    }

    function getSCnpj() {
        return $this->sCnpj;
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

    function getFLatitude() {
        return $this->fLatitude;
    }

    function getFLongitude() {
        return $this->fLongitude;
    }

    function getSFormaPagamento() {
        return $this->sFormaPagamento;
    }

    function getSDescricao() {
        return $this->sDescricao;
    }

    function setSNome($sNome) {
        $this->sNome = $sNome;
    }
    function setSEmail($sEmail) {
        $this->sEmail = $sEmail;
    }

    function setSSenha($sSenha) {
        $this->sSenha = $sSenha;
    }

    function setSCnpj($sCnpj) {
        $this->sCnpj = $sCnpj;
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

    function setFLatitude($fLatitude) {
        $this->fLatitude = $fLatitude;
    }

    function setFLongitude($fLongitude) {
        $this->fLongitude = $fLongitude;
    }

    function setSFormaPagamento($sFormaPagamento) {
        $this->sFormaPagamento = $sFormaPagamento;
    }

    function setSDescricao($sDescricao) {
        $this->sDescricao = $sDescricao;
    }


}

