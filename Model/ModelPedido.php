<?php
require_once './ModelPratos.php';
require_once './ModelCliente.php';
class ModelPedido extends ModelResaurantes {
    private $aEnderecoDeEntrega;
    function getAEnderecoDeEntrega() {
        foreach($this->aEnderecoDeEntrega AS $end)
        return $this->aEnderecoDeEntrega;
    }

    function setAEnderecoDeEntrega($aEnderecoDeEntrega) {
        $this->aEnderecoDeEntrega = new ModelCliente();
        $this->aEnderecoDeEntrega->getSCidade() = $aEnderecoDeEntrega;
    }


}

