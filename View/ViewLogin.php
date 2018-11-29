<?php
require_once 'core/trataErros.php';
class ViewLogin{
    
    public function __construct($acao) {
        $this->carregaLogin($acao);
    }


    public function carregaLogin($acao){
        if($acao == 'sair'){
            if(isset($_SESSION)){
                session_destroy();
            }
            echo '<link rel="stylesheet" href="estilo/login.css">';
            echo '<body>';
            echo    '<div id="loginCampo">';
            echo        '<form action="index.php" method="POST">';
            echo            '<legend id="login">Login</legend>';
            echo                '<label class="entrar" for="usuario">E-mail</label>';
            echo                '<input type="text" name="usuario" placeholder="exemplo@exemplo.com.br"><br>';
            echo                '<label class="entrar" for="senha">Senha</label>';
            echo                '<input type="password" name="senha" placeholder="senha...">';
            echo                '<input id="submeter" type="submit" value="Entrar" name="entrar">';
            echo        '</form>';
            echo    '</div>';
            echo '</body>';
        }
        else if($acao == 'cadastrar'){
            echo '<link rel="stylesheet" href="estilo/login.css">';
            echo '<body>';
            echo '<link rel="stylesheet" href="estilo/estiloHome.css">';
//            echo '<a href="index.php?pagina=cadastro" id="botao-cadastro">Cadastrar</a>';
            echo    '<div id="loginCampo">';
            echo        '<form action="index.php" method="POST">';
            echo            '<legend id="login">Login</legend>';
            echo                '<label class="entrar" for="usuario">E-mail</label>';
            echo                '<input type="text" name="usuario" placeholder="exemplo@exemplo.com.br"><br>';
            echo                '<label class="entrar" for="senha">Senha</label>';
            echo                '<input type="password" name="senha" placeholder="senha...">';
            echo                '<input id="submeter" type="submit" value="Entrar" name="entrar">';
            echo        '</form>';
            echo    '</div>';
            echo '</body>';
        }
        else{
            echo '<link rel="stylesheet" href="estilo/login.css">';
            echo '<body>';
            echo    '<div id="loginCampo">';
            echo        '<form action="index.php" method="POST">';
            echo            '<legend id="login">Login</legend>';
            echo                '<label class="entrar" for="usuario">E-mail</label>';
            echo                '<input type="text" name="usuario" placeholder="exemplo@exemplo.com.br"><br>';
            echo                '<label class="entrar" for="senha">Senha</label>';
            echo                '<input type="password" name="senha" placeholder="senha...">';
            echo                '<input id="submeter" type="submit" value="Entrar" name="entrar">';
            echo        '</form>';
            echo    '</div>';
            echo '</body>';
        }
    }
}

