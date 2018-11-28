<?php
session_start();
require_once './View/ViewLogin.php';
require_once './View/ViewInicial.php';
require_once './Controller/ControllerCliente.php';
require_once './Controller/ControllerLogin.php';
require_once './Controller/ControllerRoute.php';

if((isset($_GET['pagina'])) && ($_GET['pagina'] == 'cadastro') ){
    new ControllerRoute();
    die();
}
if(isset($_POST['gravar'])){
    $_SESSION['tipo'] = serialize('cliente');
}
if(isset($_SESSION['tipo'])){
    $sAcao = isset($_GET['acao']) ? $_GET['acao'] : '';
    new ControllerRoute($sAcao);
}
else{
    //session_destroy();
    $sAcao = isset($_GET['acao']) ? $_GET['acao'] : '';
    
    $oViewLogin = new ControllerLogin($sAcao);
}

