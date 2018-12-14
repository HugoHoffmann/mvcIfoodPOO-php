<?php
require_once 'Persistencia/conexao.php';
require_once 'Model/ModelRestaurantes.php';
class PersistenciaRestaurante{
    protected $oConexao;
    protected $ModelRestaurantes;
    
    public function __construct() {
        $this->oConexao = Conexao::getInstance();
    }
    public function __destruct() {
        pg_close($this->oConexao);
    }
    
    
    public function lista(){
        $oResult = pg_exec($this->oConexao, 'select * from tbrestaurante');
        $oIteratorRestaurante = new IteratorRestaurante($oResouce);
        //$aResultado = [];
//        while($aRes = pg_fetch_array($oResult)){
//            $oRestaurante = new ModelResaurantes();
//            $oRestaurante->setICodigo($aRes['rescodigo']);
//            $oRestaurante->setSNome($aRes['resnome']);
//            $oRestaurante->setSCnpj($aRes['rescnpj']);
//            $oRestaurante->setSEmail($aRes['resemail']);
//            $oRestaurante->setSCidade($aRes['rescidade']);
//            $oRestaurante->setSBairro($aRes['resbairro']);
//            $oRestaurante->setSRua($aRes['resrua']);
//            $oRestaurante->setINumero($aRes['resnumero']);
//            $oRestaurante->setSComplemento($aRes['rescomplemento']);
//            $oRestaurante->setFLatitude($aRes['reslatitude']);
//            $oRestaurante->setFLongitude($aRes['reslongitude']);
//            $oRestaurante->setSFormaPagamento($aRes['respagamento']);
//            $oRestaurante->setSDescricao($aRes['resdescricao']);
//            $aResultado[] = $oRestaurante;
//        }
        return $oIteratorRestaurante;
    }
    
    public function grava(){
        pg_exec($this->oConexao, "insert into tbrestaurante(
                                        resnome,
                                        rescnpj, 
                                        resemail, 
                                        ressenha, 
                                        rescidade, 
                                        resbairro, 
                                        resrua, 
                                        resnumero, 
                                        rescomplemento, 
                                        reslatitude,
                                        reslongitude,
                                        respagamento, 
                                        resdescricao)
                    values('".$this->ModelRestaurantes->getSNome()."', 
                           '".$this->ModelRestaurantes->getSCnpj()."',
                           '".$this->ModelRestaurantes->getSEmail()."',
                           '".$this->ModelRestaurantes->getSSenha()."',
                           '".$this->ModelRestaurantes->getSCidade()."',
                           '".$this->ModelRestaurantes->getSBairro()."',
                           '".$this->ModelRestaurantes->getSRua()."',
                           ".$this->ModelRestaurantes->getINumero().",
                           '".$this->ModelRestaurantes->getSComplemento()."',
                           '".$this->ModelRestaurantes->getFLatitude()."',
                           '".$this->ModelRestaurantes->getFLongitude()."',
                           '".$this->ModelRestaurantes->getSFormaPagamento()."',
                           '".$this->ModelRestaurantes->getSDescricao()."'
                           )");
        $rescodigo = pg_query($this->oConexao, 'select rescodigo from tbrestaurante order by rescodigo desc limit 1');
         while($codigo = pg_fetch_array($rescodigo)){
             $iRescodigo = $codigo['rescodigo'];
         }
        return pg_exec($this->oConexao, "insert into tbusuario(        
                                    rescodigo, usuemail, ususenha, usutipo)
                                  values(
                                         $iRescodigo,
                                         '".$this->ModelRestaurantes->getSEmail()."',
                                         '".$this->ModelRestaurantes->getSSenha()."', 
                                            'restaurante')");
    }
    public function exclui(){
        pg_exec($this->oConexao, 'delete from tbusuario where rescodigo = '.$this->ModelRestaurantes->getICodigo() );
        return pg_exec($this->oConexao, 'delete from tbrestaurante where rescodigo = '.$this->ModelRestaurantes->getICodigo() );
    }
    public function alteraDados(){
        pg_exec($this->oConexao, "update tbusuario set usuemail  = '".$this->ModelRestaurantes->getSEmail()."', 
                                                       ususenha = '".$this->ModelRestaurantes->getSSenha()."'
                                  where rescodigo = ".$this->ModelRestaurantes->getICodigo());
        
        return pg_exec($this->oConexao, "update tbrestaurante set resnome    = '".$this->ModelRestaurantes->getSNome()."',
                                                              rescnpj        = '".$this->ModelRestaurantes->getSCnpj()."',
                                                              resemail       = '".$this->ModelRestaurantes->getSEmail()."',
                                                              ressenha       = '".$this->ModelRestaurantes->getSSenha()."',
                                                              rescidade      = '".$this->ModelRestaurantes->getSCidade()."',
                                                              resbairro      = '".$this->ModelRestaurantes->getSBairro()."',
                                                              resrua         = '".$this->ModelRestaurantes->getSRua()."',
                                                              resnumero      = ".$this->ModelRestaurantes->getINumero().",   
                                                              rescomplemento = '".$this->ModelRestaurantes->getSComplemento()."',
                                                              reslatitude    = '".$this->ModelRestaurantes->getFLatitude()."',
                                                              reslongitude   = '".$this->ModelRestaurantes->getFLongitude()."',
                                                              respagamento   = '".$this->ModelRestaurantes->getSFormaPagamento()."',
                                                              resdescricao   = '".$this->ModelRestaurantes->getSDescricao()."'    
                                         where rescodigo = ".$this->ModelRestaurantes->getICodigo());
    }
    public function alteraSenha(){
        pg_exec($this->oConexao,"update tbusuario set ususenha = '".$this->ModelRestaurantes->getSSenha()."'where rescodigo = ".$this->ModelRestaurantes->getICodigo());
        return pg_exec($this->oConexao, "update tbrestaurante set ressenha = '".$this->ModelRestaurantes->getSSenha()."'where rescodigo = ".$this->ModelRestaurantes->getICodigo());
    }
    
    public function getModelRestaurantes() {
        return $this->ModelRestaurantes;
    }
    
    public function setModelRestaurantes($ModelRestaurantes) {
        $this->ModelRestaurantes = $ModelRestaurantes;
    }
    
}

