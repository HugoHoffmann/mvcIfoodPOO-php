<?php
class ViewClientes{
    private $aClientes = [];
    
    public function getClientes() {
        return $this->aClientes;
    }

    public function setClientes($aClientes) {
        $this->aClientes = $aClientes;
    }
    
    

    public function montaconsulta(){
        echo '<link rel="stylesheet" href="../estilo/estiloClientes.css">';
        echo    '<h2>Clientes</h2>';
        echo '<section id="tabela">';
        echo    '<table id="tabela" border="1px">';
        echo        '<tr>';
        echo            '<td>Código</td>';
        echo            '<td>Nome</td>';
        echo            '<td>CPF</td>';
        echo            '<td>Data de Nascimento</td>';
        echo            '<td>Telefone</td>';
        echo            '<td>Email</td>';
        echo            '<td>Cidade</td>';
        echo            '<td>Bairro</td>';
        echo            '<td>Rua</td>';
        echo            '<td>Numero</td>';
        echo            '<td>Complemento</td>';
        echo            '<td>Altera senha</td>';
        echo            '<td>Exclui</td>';
        echo            '<td>Edita</td>';
        echo        '</tr>';
        foreach($this->aClientes AS $oCliente){
            echo    '<tr>';
            echo        '<td>'.$oCliente->getICodigo().'</td>';
            echo        '<td>'.$oCliente->getSNome().'</td>';
            echo        '<td>'.$oCliente->getSCpf().'</td>';
            echo        '<td>'.$oCliente->getSDataNasc().'</td>';
            echo        '<td>'.$oCliente->getSTelefone().'</td>';
            echo        '<td>'.$oCliente->getSEmail().'</td>';
            echo        '<td>'.$oCliente->getSCidade().'</td>';
            echo        '<td>'.$oCliente->getSBairro().'</td>';
            echo        '<td>'.$oCliente->getSRua().'</td>';
            echo        '<td>'.$oCliente->getINumero().'</td>';
            echo        '<td>'.$oCliente->getSComplemento().'</td>';
            echo        '<td><a id="acoes" href="index.php?pagina=clientes&alteraSenha='.$oCliente->getICodigo().'">Altera senha</a></td>';
            echo        '<td><a id="acoes" href="index.php?pagina=clientes&excluir='.$oCliente->getICodigo().'">Exclui</a></td>';
            echo        '<td><a id="acoes" href="index.php?pagina=clientes&alteraCadastro='.$oCliente->getICodigo().'">Edita</a></td>';
        }
        echo '</table>';
        echo "</section>";
        
    }
    public function alteraSenha(){
        echo '<link rel="stylesheet" href="estilo/estiloClientes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php?pagina=clientes">Voltar</a>';
        echo '</div>';
        echo '<section id="nova-senha">';
        echo '<h2>Cadastro de Nova senha Cliente nº: '.$_GET['alteraSenha'].'</h2>';
        echo    '<form action = "index.php?pagina=clientes&alteraSenha='.$_GET['alteraSenha'].' " method="POST" >';
        echo        "<label for='nome'>Nova senha:<span>*</span></label>";
        echo        "<input type = 'password' name = 'senha' required='required'/>";
        
        echo        "<input type = 'reset'  value = 'Limpar' name = 'limpar'/>";
        echo        "<input type = 'submit'  value = 'Gravar' name = 'altera'/>";
        echo    "</form>";
        echo "</section>";
        echo    '<hr>';
    }
    
    public function alteraCadastro(){
       echo '<link rel="stylesheet" href="estilo/estiloClientes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php?pagina=clientes">Voltar</a>';
        echo '</div>';
        echo '<section id="altera-cadastro">';
        echo '<h2>Alteração de cadastro Cliente nº: '.$_GET['alteraCadastro'].'</h2>';
        echo    '<form action = "index.php?pagina=clientes&alteraCadastro='.$_GET['alteraCadastro'].' " method="POST" >';
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


    public function montaFormulario(){
        echo '<link rel="stylesheet" href="estilo/estiloClientes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
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