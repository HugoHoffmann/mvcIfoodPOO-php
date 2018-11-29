<?php
class ViewCadastro{
    private $aClientes = [];
    
    public function getClientes() {
        return $this->aClientes;
    }

    public function setClientes($aClientes) {
        $this->aClientes = $aClientes;
    }
    
    
    public function montaFormulario(){
        echo '<link rel="stylesheet" href="estilo/estiloClientes.css">';
        echo '<header>
                    <h2>Cadastro inicial</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php">Voltar</a>';
        echo '</div>';
        echo '<section id="formulario">';
        echo '<h2>Cadastro de Cliente</h2>';
        echo    "<form action = 'index.php?pagina=clientes&acao=gravar' method='POST' >";
        echo        "<label for='nome'>Nome:<span>*</span></label>";
        echo        "<input type = 'text' name = 'nome' required='required'/>";
        
        echo        "<label for='cpf'>CPF:<span>*</span></label>";
        echo        "<input type = 'text' name = 'cpf' required='required'/>";
        
        echo        "<label for='datanasc'>Data Nascimento:<span>*</span></label>";
        echo        "<input type = 'date' name = 'datanasc' required='required'/>";
        
        echo        "<label for='telefone'>Telefone:<span>*</span></label>";
        echo        "<input type = 'text' name = 'telefone' required='required'/>";
        
        echo        "<label for='email'>Email:<span>*</span></label>";
        echo        "<input type = 'email' name = 'email' required='required'/>";
        
        echo        "<label for='senha'>Senha:<span>*</span></label>";
        echo        "<input type = 'password' name = 'senha' required='required'/>";
        
        echo        "<label for='cidade'>Cidade:<span>*</span></label>";
        echo        "<input type = 'text' name = 'cidade' required='required'/>";
        
        echo        "<label for='bairro'>Bairro:<span>*</span></label>";
        echo        "<input type = 'text' name = 'bairro' required='required'/>";
        
        echo        "<label for='rua'>Rua:<span>*</span></label>";
        echo        "<input type = 'text' name = 'rua' required='required'/>";
        
        echo        "<label for='numero'>Numero:<span>*</span></label>";
        echo        "<input type = 'number' name = 'numero' required='required'/>";
        
        echo        "<label for='complemento'>Complemento:<span>*</span></label>";
        echo        "<input type = 'text' name = 'complemento' required='required'/>";
        
        echo        "<input type = 'reset'  value = 'Limpar' name = 'limpar'/>";
        echo        "<input type = 'submit'  value = 'Gravar' name = 'gravar'/>";
        echo    "</form>";
        echo "</section>";
        echo    '<hr>';
    }
    
   
}