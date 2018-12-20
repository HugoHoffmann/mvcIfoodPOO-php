<?php
// uso da conexão com o banco de dados  por meio do modelo singleton  
require_once 'Persistencia/conexao.php';
//uso do modelo de login para obtenção dos dados necessários para a persistência de login
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
    
   // uso do método construtor para obtenção da conexão por um método estático na classe de conexão 
    public function __construct(){
       $this->oConexao = Conexao::getInstance();
    }
    // método para destruição da conexão após seu uso
    public function __destruct() {
        pg_close($this->oConexao);
    }
   //metodo para verificação de login no banco de dados  
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

