<?php
require_once 'Persistencia/PersistenciaLogin.php';
require_once 'Persistencia/PersistenciaLogs.php';
require_once 'Model/ModelLogin.php';
require_once 'Model/ModelLogs.php';
require_once 'core/trataErros.php';
class ControllerLogin{
    protected        $PersistenciaLogin;        
    protected        $PersistenciaLogs;        
    protected        $ModelLogin;        
    protected        $ModelLogs;        
    protected static $session;        
    
    public function __construct() {
       try{
           $this->processa();
       } catch (trataErro $erro) {
           $this->PersistenciaLogs = new PersistenciaLogs();
                $this->ModelLogs = new ModelLogs();
                $this->ModelLogs->setDataHora(date('d/m/Y h:i:s A'));
                $this->ModelLogs->setMensagem($erro->getMessage());
                $this->ModelLogs->setArquivo($erro->getFile());
                $this->PersistenciaLogs->setModelLogs($this->ModelLogs);
                $this->PersistenciaLogs->grava();
                echo $erro->getMessage();
                echo '<link rel="stylesheet" href="estilo/estiloHome.css">';
                echo '<a href="index.php?pagina=cadastro" id="botao-cadastro">Cadastrar</a>';

       }
    }
    
    public function processa() {
         if(isset($_POST['entrar'])){
             $this->verificaLogin();
         } else {
             $sAcao = isset($_GET['acao']) ? $_GET['acao'] : '';
            new ViewLogin($sAcao);
         }
    }
    public static function getSession($usutipo='adm'){
        if(!isset(self::$session)){
            self::$session = serialize($usutipo);
        }
        return self::$session; 
    }

        public function verificaLogin(){
            // Verificação se o botão de login foi clicado
        if(isset($_POST['entrar'])){
            $sUsuario    = $_POST['usuario'];
            $sSenha      = $_POST['senha'];
      
            //Verificação do usuário adm, quando não for inserido nada nos campos
            if(($sUsuario == '') && ($sSenha == '')){
                $_SESSION['tipo'] = ControllerLogin::getSession();
                header('Location: index.php');
                return;
            }
            $this->PersistenciaLogin = new PersistenciaLogin();
            $this->ModelLogin = new ModelLogin();
            $this->ModelLogin->setSEmail($sUsuario);
            $this->ModelLogin->setSSenha($sSenha);
            $this->PersistenciaLogin->setModelLogin($this->ModelLogin);
            $result = $this->PersistenciaLogin->verificaLogin();
            if($result){
                $_SESSION['tipo'] = ControllerLogin::getSession($result['usutipo']); 
                header('Location: index.php');
                return;
            }
            
            // caso a consulta não retorne nenhum valor, significa que o email e senha informado não existem
            else{
                throw new trataErro("Senha ou email incorretos!");
                session_destroy();
                header('Location: index.php?acao=cadastrar');
               
            }
        }


    }
    
    
    
}