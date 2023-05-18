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
                }
            }
            ?>
        
            <?php
            if(isset($_SESSION['nome'])){
                echo '<li><a href="#reservas">Reservas</a></li>';
                echo '<li style="float:right"><a class="active" href="php/logout.php">SAIR</a></li>';
            }
            else{
                echo '<li style="float:right"><a class="active" href="login.php">LOGIN</a></li>';
            }
        ?>
      </ul>