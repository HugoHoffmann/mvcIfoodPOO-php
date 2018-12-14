<?php
require_once 'Persistencia/conexao.php';
require_once 'Model/ModelCliente.php';
class PersistenciaCliente{
    protected $oConexao;
    protected $ModelCliente;
    
    public function __construct() {
        $this->oConexao = Conexao::getInstance();
    }
    
    public function __destruct() {
        pg_close($this->oConexao);
    }
    
    public function lista(){
        $oResult = pg_exec($this->oConexao, 'select * from tbcliente');
        $aResultado = [];
        while($aRes = pg_fetch_array($oResult)){
            $oCliente = new ModelCliente();
            $oCliente->setICodigo($aRes['clicodigo']);
            $oCliente->setSNome($aRes['clinome']);
            $oCliente->setSCpf($aRes['clicpf']);
            $oCliente->setSDataNasc($aRes['clidatanasc']);
            $oCliente->setSTelefone($aRes['clitelefone']);
            $oCliente->setSEmail($aRes['cliemail']);
            $oCliente->setSCidade($aRes['clicidade']);
            $oCliente->setSBairro($aRes['clibairro']);
            $oCliente->setSRua($aRes['clirua']);
            $oCliente->setINumero($aRes['clinumero']);
            $oCliente->setSComplemento($aRes['clicomplemento']);
            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }
    
    public function grava(){
         pg_exec($this->oConexao, "insert into tbcliente(clinome, 
                        clicpf, clidatanasc, clitelefone, 
                        cliemail, clisenha, clicidade, 
                        clibairro, clirua, clinumero, clicomplemento
                    )
                    values('".$this->ModelCliente->getSNome()."', 
                           '".$this->ModelCliente->getSCpf()."',
                           '".$this->ModelCliente->getSDataNasc()."',
                           '".$this->ModelCliente->getSTelefone()."',
                           '".$this->ModelCliente->getSEmail()."',
                           '".$this->ModelCliente->getSSenha()."',
                           '".$this->ModelCliente->getSCidade()."',
                           '".$this->ModelCliente->getSBairro()."',
                           '".$this->ModelCliente->getSRua()."',
                           ".$this->ModelCliente->getINumero().",   
                           '".$this->ModelCliente->getSComplemento()."'
                           )");
         $clicodigo = pg_query($this->oConexao, 'select clicodigo from tbcliente order by clicodigo desc limit 1');
         while($codigo = pg_fetch_array($clicodigo)){
             $iClicodigo = $codigo['clicodigo'];
         }
        return pg_exec($this->oConexao, "insert into tbusuario(        
                                    clicodigo, usuemail, ususenha, usutipo)
                                  values(
                                         $iClicodigo,
                                         '".$this->ModelCliente->getSEmail()."',
                                         '".$this->ModelCliente->getSSenha()."', 
                                            'cliente')");
    }
    
    public function exclui(){
        pg_exec($this->oConexao, 'delete from tbusuario where clicodigo = '.$this->ModelCliente->getICodigo() );
        return pg_exec($this->oConexao, 'delete from tbcliente where clicodigo = '.$this->ModelCliente->getICodigo() );
    }
    
    public function alteraDados(){
        pg_exec($this->oConexao, "update tbusuario set usuemail  = '".$this->ModelCliente->getSEmail()."', 
                                                       ususenha = '".$this->ModelCliente->getSSenha()."'
                                  where clicodigo = ".$this->ModelCliente->getICodigo());
        
        return pg_exec($this->oConexao, "update tbcliente set clinome        = '".$this->ModelCliente->getSNome()."',
                                                              clicpf         = '".$this->ModelCliente->getSCpf()."',
                                                              clidatanasc    = '".$this->ModelCliente->getSDataNasc()."',
                                                              clitelefone    = '".$this->ModelCliente->getSTelefone()."',
                                                              cliemail       = '".$this->ModelCliente->getSEmail()."',
                                                              clisenha       = '".$this->ModelCliente->getSSenha()."',
                                                              clicidade      = '".$this->ModelCliente->getSCidade()."',
                                                              clibairro      = '".$this->ModelCliente->getSBairro()."',
                                                              clirua         = '".$this->ModelCliente->getSRua()."',
                                                              clinumero      = ".$this->ModelCliente->getINumero().",   
                                                              clicomplemento = '".$this->ModelCliente->getSComplemento()."' 
                                         where clicodigo = ".$this->ModelCliente->getICodigo());
    }
    
    public function alteraSenha(){
        pg_exec($this->oConexao,"update tbusuario set ususenha = '".$this->ModelCliente->getSSenha()."'where clicodigo = ".$this->ModelCliente->getICodigo());
        return pg_exec($this->oConexao, "update tbcliente set clisenha = '".$this->ModelCliente->getSSenha()."'where clicodigo = ".$this->ModelCliente->getICodigo());
    }
    
    public function getModelCliente() {
        return $this->ModelCliente;
    }

    public function setModelCliente($ModelCliente) {
        $this->ModelCliente = $ModelCliente;
    }
    
}