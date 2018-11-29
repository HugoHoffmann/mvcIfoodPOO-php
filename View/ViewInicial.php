<?php
class ViewIncial{
    
    public function __construct() {
        $this->VerificaUsuário();
    }


    public function VerificaUsuário(){
        $sTipo = unserialize($_SESSION['tipo']);
        echo '<body>
                <header>
                    <h2>Projeto PHP + Banco de dados (postgres) + POO + MVC</h2>
                    <img src="img/logo.png" >
                </header>';
            // verificação necessária para mostragem do menu para o cliente logado, 
            // sendo que o mesmo só poderá verificar se possui pedidos
            echo '<link rel="stylesheet" href="estilo/estiloHome.css">';
                if($sTipo == 'adm'){
                    echo '<nav>';
                    echo '<p>User: ADM</p>';
                    echo '<ul>';
                    echo '<li><a href="index.php">Início</a></li>
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
                    echo '<li><a href="index.php">Início</a></li>
                            <li><a href="index.php?pagina=prato">Pratos</a></li>
                            <li><a href="index.php?pagina=servico">Serviço</a></li>
                            <li><a href="index.php?pagina=login&acao=sair">Sair</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
                // neste caso o usuário logado será o adm,
                // sendo que o mesmo tem todos os privilégios
                else{
                    // passagem de parâmentro abaixo para que a página home fique acessível   
                    // o mesmo acontece com o restante das opções
                    echo '<nav>';
                    echo '<p>User: Cliente</p>';
                    echo '<ul>';
                    echo'
                        <li><a href="index.php">Início</a></li>
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

