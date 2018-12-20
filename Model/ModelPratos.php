<?php
require_once './ModelRestaurantes.php';
class ModelPratos extends ModelResaurantes{
    private $sNome;
    private $sCategoria;
    private $sDescricaoDetalhada;
    private $fValorUni;
    private $sStatus;
    private $sData;
    private $sHora;
    
    function getSNome() {
        return $this->sNome;
    }

    function getSCategoria() {
        return $this->sCategoria;
    }

    function getSDescricaoDetalhada() {
        return $this->sDescricaoDetalhada;
    }

    function getFValorUni() {
        return $this->fValorUni;
    }

    function getSStatus() {
        return $this->sStatus;
    }

    function getSData() {
        return $this->sData;
    }

    function getSHora() {
        return $this->sHora;
    }

    function setSNome($sNome) {
        $this->sNome = $sNome;
    }

    function setSCategoria($sCategoria) {
        $this->sCategoria = $sCategoria;
    }

    function setSDescricaoDetalhada($sDescricaoDetalhada) {
        $this->sDescricaoDetalhada = $sDescricaoDetalhada;
    }

    function setFValorUni($fValorUni) {
        $this->fValorUni = $fValorUni;
    }

    function setSStatus($sStatus) {
        $this->sStatus = $sStatus;
    }

    function setSData($sData) {
        $this->sData = $sData;
    }

    function setSHora($sHora) {
        $this->sHora = $sHora;
    }


}