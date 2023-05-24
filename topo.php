        <link href="css/styles.css" rel="stylesheet" />
        <!-- Navigation-->
        <ul>
            <li><a href="index.php">Início</a></li>
            <?php
            if(isset($_SESSION['funcaoId'])){
                if($_SESSION['funcaoId'] == 1 || 
                $_SESSION['funcaoId'] == 3
                ){
                    echo '<li><a href="gerenciar_usuarios.php">Gerenciar clientes</a></li>';
                    echo '<li><a href="gerenciar_viagens.php">Gerenciar viagens</a></li>';
                    echo '<li><a href="gerenciar_lugares.php">Gerenciar lugares</a></li>';
                }
            }
            ?>
            
            <?php
            if(isset($_SESSION['idPessoa'])){
                echo '<li><a href="reservar_viagens.php">Reservar viagens</a></li>';
                echo '<li style="float:right"><a class="active" href="logout.php">SAIR</a></li>';
            }
            else{
                echo '<li style="float:right"><a class="active" href="login.php">LOGIN</a></li>';
            }
        ?>
      </ul>