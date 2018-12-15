<?php
require_once 'Model/ModelRestaurantes.php';//realpath("ModelRestaurantes.php");//'Model/ModelRestaurantes.php';//$_SERVER['SCRIPT_FILENAME'];
require_once 'Persistencia/PersistenciaRestaurante.php';//realpath("PersistenciaRestaurante.php");//'Persistencia/PersistenciaRestaurante.php';
require_once 'Persistencia/PersistenciaUsuario.php';//realpath("PersistenciaUsuario.php");//'Persistencia/PersistenciaUsuario.php';
require_once 'View/ViewRestaurantes.php';//realpath("ViewRestaurantes.php");//'View/ViewRestaurantes.php';
class ControllerRestaurante{
    /**
     *
     * @var ModelRestaurantes
     */
    protected $ModelRestaurantes;
    
    /**
     * @var ViewRestaurantes
     */
    protected $ViewRestaurantes;
    
    /**
     * @var PersistenciaRestaurante
     */
    protected $PersistenciaRestaurante;
    
    /**
     * @var PersistenciaUsuario
     */
    protected $PersistenciaUsuario;
    
    public function __construct() {
        $this->processa();
    }
    
    public function gravaDados(){
        $sNome = $_POST['nome'];
        $sCnpj = $_POST['cnpj'];
        $sEmail = $_POST['email'];
        $sSenha = $_POST['senha'];
        $sCidade = $_POST['cidade'];
        $sBairro = $_POST['bairro'];
        $sRua = $_POST['rua'];
        $iNumero= $_POST['numero'];
        $sComplemento = $_POST['complemento'];
        $fLatitude = $_POST['latitude'];
        $fLongitude = $_POST['longitude'];
        $sFormaDePagamento = $_POST['formaPagamento'];
        $sDescricao = $_POST['descricao'];
        $this->ModelRestaurantes = new ModelResaurantes();
        $this->ModelRestaurantes->setSNome($sNome);
        $this->ModelRestaurantes->setSCnpj($sCnpj);
        $this->ModelRestaurantes->setSEmail($sEmail);
        $this->ModelRestaurantes->setSSenha($sSenha);
        $this->ModelRestaurantes->setSCidade($sCidade);
        $this->ModelRestaurantes->setSBairro($sBairro);
        $this->ModelRestaurantes->setSRua($sRua);
        $this->ModelRestaurantes->setINumero($iNumero);
        $this->ModelRestaurantes->setSComplemento($sComplemento);
        $this->ModelRestaurantes->setFLatitude($fLatitude);
        $this->ModelRestaurantes->setFLongitude($fLongitude);
        $this->ModelRestaurantes->setSFormaPagamento($sFormaDePagamento);
        $this->ModelRestaurantes->setSDescricao($sDescricao);
        $this->PersistenciaRestaurante->setModelRestaurantes($this->ModelRestaurantes);
        $this->PersistenciaRestaurante->grava();
    }
    
    public function excluiDados(){
        $iCodigo = $_GET['excluir'];
        $this->ModelRestaurantes = new ModelResaurantes();
        $this->ModelRestaurantes->setICodigo($iCodigo);
        $this->PersistenciaRestaurante->setModelRestaurantes($this->ModelRestaurantes);
        $this->PersistenciaRestaurante->exclui();
    }
    
    
    public function alteraSenha(){
        $iCodigo = $_GET['alteraSenha'];
        $sSenha = $_POST['senha'];
        $this->ModelResaurantes = new ModelResaurantes();
        $this->ModelResaurantes->setICodigo($iCodigo);
        $this->ModelResaurantes->setSSenha($sSenha);
        $this->PersistenciaRestaurante->setModelRestaurantes($this->ModelResaurantes);
        $this->PersistenciaRestaurante->alteraSenha();
    }
    
    public function alteraDados(){
        $iCodigo = $_GET['alteraCadastro'];
        $sNome = $_POST['nome'];
        $sCnpj = $_POST['cnpj'];
        $sEmail = $_POST['email'];
        $sSenha = $_POST['senha'];
        $sCidade = $_POST['cidade'];
        $sBairro = $_POST['bairro'];
        $sRua = $_POST['rua'];
        $iNumero= $_POST['numero'];
        $sComplemento = $_POST['complemento'];
        $fLatitude = $_POST['latitude'];
        $fLongitude = $_POST['longitude'];
        $sFormaDePagamento = $_POST['formaPagamento'];
        $sDescricao = $_POST['descricao'];
        $this->ModelRestaurantes = new ModelResaurantes();
        $this->ModelRestaurantes->setICodigo($iCodigo);
        $this->ModelRestaurantes->setSNome($sNome);
        $this->ModelRestaurantes->setSCnpj($sCnpj);
        $this->ModelRestaurantes->setSEmail($sEmail);
        $this->ModelRestaurantes->setSSenha($sSenha);
        $this->ModelRestaurantes->setSCidade($sCidade);
        $this->ModelRestaurantes->setSBairro($sBairro);
        $this->ModelRestaurantes->setSRua($sRua);
        $this->ModelRestaurantes->setINumero($iNumero);
        $this->ModelRestaurantes->setSComplemento($sComplemento);
        $this->ModelRestaurantes->setFLatitude($fLatitude);
        $this->ModelRestaurantes->setFLongitude($fLongitude);
        $this->ModelRestaurantes->setSFormaPagamento($sFormaDePagamento);
        $this->ModelRestaurantes->setSDescricao($sDescricao);
        $this->PersistenciaRestaurante->setModelRestaurantes($this->ModelRestaurantes);
        $this->PersistenciaRestaurante->alteraDados();
    }
    
    public function processa(){
        $this->PersistenciaRestaurante = new PersistenciaRestaurante();
        if(isset($_GET['excluir'])){
            $this->excluiDados();
        }
        
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->alteraDados();
        }
        if(isset($_GET['alteraCadastro'])){
            $this->ViewRestaurantes = new ViewRestaurantes();
            $this->ViewRestaurantes->alteraCadastro();
            die();
        }
        
        if(isset($_POST['senha']) && $_POST['senha'] != ''){
            $this->alteraSenha();
        }
        if(isset($_GET['alteraSenha'])){
            $this->ViewRestaurantes = new ViewRestaurantes();
            $this->ViewRestaurantes->alteraSenha();
            die();
        }
        
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->gravaDados();
        }
        $aRestaurantes = $this->PersistenciaRestaurante->lista();
        $this->ViewRestaurantes         = new ViewRestaurantes();        
        $this->ViewRestaurantes->setRestaurantes($aRestaurantes);
        $this->ViewRestaurantes->montaFormulario();
        $this->ViewRestaurantes->montaConsulta();
    }
}
