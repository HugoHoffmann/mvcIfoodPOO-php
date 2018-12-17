<?php

class ModelLogs{
    private $datahora;
    private $mensagem;
    private $arquivo;
    
    function getDataHora() {
        return $this->data;
    }


    function getMensagem() {
        return $this->mensagem;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function setDataHora($data) {
        $this->data = $data;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }


}
