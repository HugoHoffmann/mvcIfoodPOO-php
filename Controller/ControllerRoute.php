<?php
require_once './Controller/ControllerCliente.php';
require_once './Controller/ControllerCadastro.php';
require_once './Controller/ControllerRestaurante.php';
require_once './Controller/ControllerCadastro.php';
require_once './Controller/ControllerLogin.php';
require_once './View/ViewInicial.php';
class ControllerRoute{    
    
    public function __construct() {
        $sPagina = isset($_GET['pagina']) ? $_GET['pagina'] : '';
        switch($sPagina){
            case 'clientes':
                new ControllerCliente();
            break;
            case 'gravar':
                new ControllerCliente();
            break;
            case 'sair':
                new ControllerLogin('sair');
            break;
            case 'cadastro':
                new ControllerCadastro();
            break;
            case 'restaurante':
                new ControllerRestaurante();
            break;
            case 'login':
                new ControllerLogin();
            break;
            default :
                new ViewIncial();
            break;
        }
    }
    
    
}

