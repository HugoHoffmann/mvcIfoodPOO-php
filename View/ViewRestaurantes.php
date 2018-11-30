<?php

class ViewRestaurantes{
    private $aRestaurantes = [];
    
    function getRestaurantes() {
        return $this->aRestaurantes;
    }

    function setRestaurantes($aRestaurantes) {
        $this->aRestaurantes = $aRestaurantes;
    }
    
    public function montaconsulta(){
        echo '<link rel="stylesheet" href="../estilo/estiloRestaurantes.css">';
        echo    '<h2>Restaurantes</h2>';
        echo '<section id="tabela">';
        echo    '<table id="tabela" border="1px">';
        echo        '<tr>';
        echo            '<td>Código</td>';
        echo            '<td>Nome</td>';
        echo            '<td>CNPJ</td>';
        echo            '<td>Email</td>';
        echo            '<td>Cidade</td>';
        echo            '<td>Bairro</td>';
        echo            '<td>Rua</td>';
        echo            '<td>Numero</td>';
        echo            '<td>Complemento</td>';
        echo            '<td>Latitude</td>';
        echo            '<td>Longitude</td>';
        echo            '<td>Forma de pagamento</td>';
        echo            '<td>Descricao</td>';
        echo            '<td>Altera senha</td>';
        echo            '<td>Exclui</td>';
        echo            '<td>Edita</td>';
        echo        '</tr>';
        foreach($this->aRestaurantes AS $oRestaurantes){
            echo    '<tr>';
            echo        '<td>'.$oRestaurantes->getICodigo().'</td>';
            echo        '<td>'.$oRestaurantes->getSNome().'</td>';
            echo        '<td>'.$oRestaurantes->getSCnpj().'</td>';
            echo        '<td>'.$oRestaurantes->getSEmail().'</td>';
            echo        '<td>'.$oRestaurantes->getSCidade().'</td>';
            echo        '<td>'.$oRestaurantes->getSBairro().'</td>';
            echo        '<td>'.$oRestaurantes->getSRua().'</td>';
            echo        '<td>'.$oRestaurantes->getINumero().'</td>';
            echo        '<td>'.$oRestaurantes->getSComplemento().'</td>';
            echo        '<td>'.$oRestaurantes->getFLatitude().'</td>';
            echo        '<td>'.$oRestaurantes->getFLongitude().'</td>';
            echo        '<td>'.$oRestaurantes->getSFormaPagamento().'</td>';
            echo        '<td>'.$oRestaurantes->getSDescricao().'</td>';
            echo        '<td><a id="acoes" href="index.php?pagina=restaurante&alteraSenha='.$oRestaurantes->getICodigo().'">Altera senha</a></td>';
            echo        '<td><a id="acoes" href="index.php?pagina=restaurante&excluir='.$oRestaurantes->getICodigo().'">Exclui</a></td>';
            echo        '<td><a id="acoes" href="index.php?pagina=restaurante&alteraCadastro='.$oRestaurantes->getICodigo().'">Edita</a></td>';
        }
        echo '</table>';
        echo "</section>";
    }
     public function montaFormulario(){
        echo '<link rel="stylesheet" href="estilo/estiloRestaurantes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php">Voltar</a>';
        echo '</div>';
        echo '<section id="formulario">';
        echo '<h2>Cadastro de Restaurantes</h2>';
        echo    "<form action = 'index.php?pagina=restaurante&acao=gravar' method='POST' >";
        echo        "<label for='nome'>Nome:<span>*</span></label>";
        echo        "<input type = 'text' name = 'nome' required='required'/>";
        
        echo        "<label for='cnpj'>CNPJ:<span>*</span></label>";
        echo        "<input type = 'text' name = 'cnpj' required='required'/>";
        
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

        echo        "<label for='latitude'>Latitude:<span>*</span></label>";
        echo        "<input type = 'text' name = 'latitude' required='required'/>";

        echo        "<label for='longitude'>Longitude:<span>*</span></label>";
        echo        "<input type = 'text' name = 'longitude' required='required'/>";

        echo        "<label for='formaPagamento'>Forma de Pagamento:<span>*</span></label>";
        echo        "<input type = 'text' name = 'formaPagamento' required='required'/>";

        echo        "<label for='descricao'>Descricao:<span>*</span></label>";
        echo        "<input type = 'text' name = 'descricao' required='required'/>";
        
        echo        "<input type = 'reset'  value = 'Limpar' name = 'limpar'/>";   
        echo        "<input type = 'submit'  value = 'Gravar' name = 'gravar'/>";
        echo    "</form>";
        echo "</section>";
        echo    '<hr>';
    }
    
    public function alteraSenha(){
        echo '<link rel="stylesheet" href="estilo/estiloRestaurantes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php?pagina=restaurante">Voltar</a>';
        echo '</div>';
        echo '<section id="nova-senha">';
        echo '<h2>Cadastro de Nova senha, Restaurante nº: '.$_GET['alteraSenha'].'</h2>';
        echo    '<form action = "index.php?pagina=restaurante&alteraSenha='.$_GET['alteraSenha'].' " method="POST" >';
        echo        "<label for='nome'>Nova senha:<span>*</span></label>";
        echo        "<input type = 'password' name = 'senha' required='required'/>";
        
        echo        "<input type = 'reset'  value = 'Limpar' name = 'limpar'/>";
        echo        "<input type = 'submit'  value = 'Gravar' name = 'altera'/>";
        echo    "</form>";
        echo "</section>";
        echo    '<hr>';
    }
    
    public function alteraCadastro(){
       echo '<link rel="stylesheet" href="estilo/estiloRestaurantes.css">';
        echo '<header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
        echo '<div id="botao-fixo">';
        echo '<a id="voltar" href="index.php?pagina=restaurante">Voltar</a>';
        echo '</div>';
        echo '<section id="altera-cadastro">';
        echo '<h2>Alteração de cadastro Restaurante nº: '.$_GET['alteraCadastro'].'</h2>';
        echo    '<form action = "index.php?pagina=restaurante&alteraCadastro='.$_GET['alteraCadastro'].' " method="POST" >';
        echo        "<label for='nome'>Nome:<span>*</span></label>";
        echo        "<input type = 'text' name = 'nome' required='required'/>";
        
        echo        "<label for='cnpj'>CNPJ:<span>*</span></label>";
        echo        "<input type = 'text' name = 'cnpj' required='required'/>";
        
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

        echo        "<label for='latitude'>Latitude:<span>*</span></label>";
        echo        "<input type = 'text' name = 'latitude' required='required'/>";

        echo        "<label for='longitude'>Longitude:<span>*</span></label>";
        echo        "<input type = 'text' name = 'longitude' required='required'/>";

        echo        "<label for='formaPagamento'>Forma de Pagamento:<span>*</span></label>";
        echo        "<input type = 'text' name = 'formaPagamento' required='required'/>";

        echo        "<label for='descricao'>Descricao:<span>*</span></label>";
        echo        "<input type = 'text' name = 'descricao' required='required'/>";
        
        echo        "<input type = 'reset'  value = 'Limpar' name = 'limpar'/>";   
        echo        "<input type = 'submit'  value = 'Gravar' name = 'altera'/>";
        echo    "</form>";
        echo "</section>";
        echo    '<hr>'; 
    }

}
