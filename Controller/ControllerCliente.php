<?php
//require_once 'Model/ModelCliente.php';
require_once './Persistencia/PersistenciaCliente.php';
//require_once './Persistencia/PersistenciaUsuario.php';
require_once 'View/ViewClientes.php';

class ControllerCliente{
    /**
     *
     * @var ModelCliente 
     */
    protected $ModelCliente;
    
    /**
     * @var ViewCliente 
     */
    protected $ViewCliente;
    
    /**
     * @var PersistenciaCliente 
     */
    protected $PersistenciaCliente;
    
    /**
     * @var PersistenciaUsuario
     */
    protected $PersistenciaUsuario;
    
    
    
    public function __construct() {
        $this->processa();
    }
    
    public function gravaDados(){
        $sNome = $_POST['nome'];
        $sCpf = $_POST['cpf'];
        $sDataNasc = $_POST['datanasc'];
        $sTelefone = $_POST['telefone'];
        $sEmail = $_POST['email'];
        $sSenha = $_POST['senha'];
        $sCidade = $_POST['cidade'];
        $sBairro = $_POST['bairro'];
        $sRua = $_POST['rua'];
        $iNumero= $_POST['numero'];
        $sComplemento = $_POST['complemento'];
        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setSNome($sNome);
        $this->ModelCliente->setSCpf($sCpf);
        $this->ModelCliente->setSDataNasc($sDataNasc);
        $this->ModelCliente->setSTelefone($sTelefone);
        $this->ModelCliente->setSEmail($sEmail);
        $this->ModelCliente->setSSenha($sSenha);
        $this->ModelCliente->setSCidade($sCidade);
        $this->ModelCliente->setSBairro($sBairro);
        $this->ModelCliente->setSRua($sRua);
        $this->ModelCliente->setINumero($iNumero);
        $this->ModelCliente->setSComplemento($sComplemento);
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->grava();
    }
    
     public function excluiDados(){
        $iCodigo = $_GET['excluir'];
        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setICodigo($iCodigo);
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->exclui();
    }
    public function alteraSenha(){
        $iCodigo = $_GET['alteraSenha'];
        $sSenha = $_POST['senha'];
        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setICodigo($iCodigo);
        $this->ModelCliente->setSSenha($sSenha);
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->alteraSenha();
    }
    
    public function alteraDados(){
        $iCodigo = $_GET['alteraCadastro'];
        $sNome = $_POST['nome'];
        $sCpf = $_POST['cpf'];
        $sDataNasc = $_POST['datanasc'];
        $sTelefone = $_POST['telefone'];
        $sEmail = $_POST['email'];
        $sSenha = $_POST['senha'];
        $sCidade = $_POST['cidade'];
        $sBairro = $_POST['bairro'];
        $sRua = $_POST['rua'];
        $iNumero= $_POST['numero'];
        $sComplemento = $_POST['complemento'];
        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setICodigo($iCodigo);
        $this->ModelCliente->setSNome($sNome);
        $this->ModelCliente->setSCpf($sCpf);
        $this->ModelCliente->setSDataNasc($sDataNasc);
        $this->ModelCliente->setSTelefone($sTelefone);
        $this->ModelCliente->setSEmail($sEmail);
        $this->ModelCliente->setSSenha($sSenha);
        $this->ModelCliente->setSCidade($sCidade);
        $this->ModelCliente->setSBairro($sBairro);
        $this->ModelCliente->setSRua($sRua);
        $this->ModelCliente->setINumero($iNumero);
        $this->ModelCliente->setSComplemento($sComplemento);
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->alteraDados();
    }
    


    public function processa(){
        $this->PersistenciaCliente = new PersistenciaCliente();
        if(isset($_GET['excluir'])){
            $this->excluiDados();
        }
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->alteraDados();
        }
        if(isset($_GET['alteraCadastro'])){
            $this->ViewCliente = new ViewClientes();
            $this->ViewCliente->alteraCadastro();
            die();
        }
        if(isset($_POST['senha']) && $_POST['senha'] != ''){
            $this->alteraSenha();
        }
        if(isset($_GET['alteraSenha'])){
            $this->ViewCliente = new ViewClientes();
            $this->ViewCliente->alteraSenha();
            die();
        }
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->gravaDados();
        }
        $aClientes = $this->PersistenciaCliente->lista();
        $this->ViewCliente = new ViewClientes();        
        $this->ViewCliente->setClientes($aClientes);
        
        $this->ViewCliente->montaFormulario();
        $this->ViewCliente->montaConsulta();
    }
}