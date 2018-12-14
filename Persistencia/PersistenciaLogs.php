<?php
require_once 'Persistencia/conexao.php';
require_once 'Model/ModelLogs.php';

class PersistenciaLogs{
    protected $oConexao;
    
    
    
    public function __construct(){
       $this->oConexao = Conexao::getInstance();
    }
    
//    public function __destruct() {
//        pg_close($this->oConexao);
//    }
    
    
    public function grava(){
         pg_exec($this->oConexao, "insert into tblog(loghoradata, 
                        logmensagem, logarquivo 
                    )
                    values('".$this->ModelLogs->getDataHora()."', 
                           '".$this->ModelLogs->getMensagem()."',
                           '".$this->ModelLogs->getArquivo()."'
                           )");
    }
    
    public function getModelLogs() {
        return $this->ModelLogs;
    }

    public function setModelLogs($ModelLogs) {
        $this->ModelLogs = $ModelLogs;
    }
    
    
    
    
    
}

