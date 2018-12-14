<?php
require_once 'Persistencia/conexao.php';
class PersistenciaUsuario{
    protected $oConexao;
    protected $ModelRestaurantes;
    
    public function __construct() {
        $this->oConexao = Conexao::getInstance();
    }
    public function __destruct() {
        pg_close($this->oConexao);
    }
    
    
    
    
}

