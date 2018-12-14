<?php
require_once 'Persistencia/conexao.php';
require_once 'Model/ModelLogin.php';
class PersistenciaLogin implements Iterator{
    
    /**
     *
     * @var resource 
     */
    private $oResource;
    private $iNumRows;
    private $iActualKey = 0;    
    private $oPersisencia;
    
    protected $oConexao;
    protected $ModelLogin;
    
    
    public function __construct(){
       $this->oConexao = Conexao::getInstance();
    }
    
    public function __destruct() {
        pg_close($this->oConexao);
    }
    
    public function verificaLogin(){        
        $oResult = pg_query($this->oConexao, "select usuemail, ususenha, usutipo from tbusuario where ususenha = '".$this->ModelLogin->getSSenha()."' and usuemail = '".$this->ModelLogin->getSEmail()."'  ");
        $aResultado = [];
        while($aRes = pg_fetch_array($oResult, null, PGSQL_ASSOC)){
            return $aRes;
//            $aResultado[] = $oResult;
//            $aResultado[] = $oResult;
        }
    }
    
    public function getModelLogin() {
        return $this->ModelLogin;
    }

    public function setModelLogin($ModelLogin) {
        $this->ModelLogin = $ModelLogin;
    }
    
}

