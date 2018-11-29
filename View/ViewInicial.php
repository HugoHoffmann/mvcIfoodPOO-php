<?php
class ViewIncial{
    
    public function __construct() {
        $this->VerificaUsu�rio();
    }


    public function VerificaUsu�rio(){
        $sTipo = unserialize($_SESSION['tipo']);
        echo '<body>
                <header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
            // verifica��o necess�ria para mostragem do menu para o cliente logado, 
            // sendo que o mesmo s� poder� verificar se possui pedidos
            echo '<link rel="stylesheet" href="estilo/estiloHome.css">';
                if($sTipo == 'adm'){
                    echo '<nav>';
                    echo '<p>User: ADM</p>';
                    echo '<ul>';
                    echo '<li><a href="index.php">In�cio</a></li>
                            <li><a href="index.php?pagina=clientes">Clientes</a></li>
                            <li><a href="index.php?pagina=restaurante">Restaurantes</a></li>
                            <li><a href="index.php?pagina=login&acao=sair">Sair</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
                else if($sTipo == 'restaurante'){
                    echo '<nav>';
                    echo '<p>User: Restaurante</p>';
                    echo '<ul>';
                    echo '<li><a href="index.php">In�cio</a></li>
                            <li><a href="index.php?pagina=prato">Pratos</a></li>
                            <li><a href="index.php?pagina=servico">Servi�o</a></li>
                            <li><a href="index.php?pagina=login&acao=sair">Sair</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
                // neste caso o usu�rio logado ser� o adm,
                // sendo que o mesmo tem todos os privil�gios
                else{
                    // passagem de par�mentro abaixo para que a p�gina home fique acess�vel   
                    // o mesmo acontece com o restante das op��es
                    echo '<nav>';
                    echo '<p>User: Cliente</p>';
                    echo '<ul>';
                    echo'
                        <li><a href="index.php">In�cio</a></li>
                        <li><a href="index.php?pagina=pedidos">Pedidos</a></li>
                        <li><a href="index.php?pagina=login&acao=sair">Sair</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
                echo '</body>';
                
                //listagem e formulario
                
//                $oRounter = new ControllerRoute();
    }
}

