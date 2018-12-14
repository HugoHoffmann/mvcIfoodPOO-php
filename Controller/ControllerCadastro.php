<?php
//require_once 'Model/ModelCliente.php';
require_once './Persistencia/PersistenciaCliente.php';
//require_once './Persistencia/PersistenciaUsuario.php';
require_once 'View/ViewCadastro.php';

class ControllerCadastro{
    /**
     *
     * @var ModelCliente 
     */
    protected $ModelCliente;
    
    /**
     * @var ViewCliente 
     */
    protected $ViewCadastro;
    
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

    public function processa(){
        $this->PersistenciaCliente = new PersistenciaCliente();
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->gravaDados();
        }
        $this->ViewCadastro        = new ViewCadastro();        
//        $this->ViewCadastro->setClientes($aClientes);
        $this->ViewCadastro->montaFormulario();
    }
}