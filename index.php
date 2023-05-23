<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="css/lightbox.min.css">
        <style>
            div.gallery {
              margin: 5px;
              border: 1px solid #ccc;
              float: left;
              width: 400px;
            }
            
            div.gallery:hover {
              border: 1px solid #777;
            }
            
            div.gallery img {
              width: 100%;
              height: auto;
            }
            
            div.desc {
              padding: 15px;
              text-align: center;
            }

            
            </style>
        <title>Agência Splash</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="home">
        
    <?php
    require "topo.php";
    ?>        

      <div class="containerB">
        <img
            src="images/Capa.png" width="100%"
        />
        <p><font face = 'Roboto' </font>
             AGÊNCIA SPLASH: <br> Aqui você realiza seus Sonhos</p>
    </div>
        
        <!-- Header-->
        
        <!-- About section-->
        <section id="sobre">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2><b>Sobre nós</b></h2><br><br>

                        <h5>Conheça as maravilhas da natureza. Venha conosco conquistar o oceano com os nossos roteiros mágicos dos 5 continentes. <br><br></h5>
                        <p style="font-size: 20px;" class="lead">
                            

                            Conheça nossos pacotes e desfrute dos melhores destinos, com festas, música, teatro, comida e muita diversão. <br><br>

                            Nossa agência pode oferecer as melhores condições de pagamento, em alta ou baixa temporada para que seu sonho seja realizado. <br><br>

                            Os destinos mais buscados atualmente são:<br>
                            <a href="https://www.bahamas.com/pt">Bahamas</a>
                            ,
                            <a href="https://www.ci.com.br/pt-br/explore-o-mundo/grecia/mykonos">Ilhas Gregas</a>                            
                            ,
                            <a href="https://dicasdecancun.com.br/cancun/o-que-fazer-em-cancun/">Cancún</a>
                            ,
                            <a href="http://www.angra.com.br/home/angra/">Angra dos Reis</a>
                            e 
                            <a href="https://guia.melhoresdestinos.com.br/filipinas-240-c.html">Filipinas.</a>


                        </p>
                        <br>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact section-->
        <section id="galeria">
          <h1><b>Galeria</b></h1>
          <h4>Clique para ver o que você vai viver nos nossos cruzeiros.<br>Alterne entre as images com as setas do teclado.<br><br></h4>
          <a href="images/familiabrincando.jpg" data-lightbox="image-1" data-title="Aqui você encontra muita diversão"> <img class="example-image" src="images/familiabrincando.jpg" alt="image-1" width="26%" height="5%"/></a>
          <a href="images/piscinacruzeiro.jpg" data-lightbox="image-1" data-title="Piscinas luxuosas em alto mar"> <img class="example-image" src="images/piscinacruzeiro.jpg" alt="image-1" width="22%" height="5%"/></a>
          <a href="images/boliche.jpg" data-lightbox="image-1" data-title="Para todos os tipos de aventura"> <img class="example-image" src="images/boliche.jpg" alt="image-1" width="22%" height="5%"/></a>
          <a href="images/festa.jpg" data-lightbox="image-1" data-title="Seu sonho começa aqui"> <img class="example-image" src="images/festa.jpg" alt="image-1" width="24.5%" height="5%"/></a>
        </section>


        <!-- Galeria-->


<section id="mapa">
          <h2><b>Mapa</b></h2><br><br>
          
        
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.943071865133!2d-49.40203088454311!3d-20.793590871112976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bdad05c0fc7029%3A0x62eba8406bb0e126!2sFatec%20-%20Faculdade%20de%20Tecnologia%20de%20S%C3%A3o%20Jos%C3%A9%20do%20Rio%20Preto!5e0!3m2!1spt-BR!2sbr!4v1670100788312!5m2!1spt-BR!2sbr" 
          width="100%" height="450" justify-content= 'center';
          align-itens= 'center'; allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
        </section>

        <section id="contatos">
          
          <h2><b>Nossos contatos</b></h2><br>
          <p style="font-size: 20px;" class="lead">
            <b> Agência de viagem Splash Cruzeiro<br></b>
            Telefone: 0800 80080023<br>
            E-mail: contato@splashcruziro.com.br<br>
            Endereço: Rua  Fernandópolis, 2510 - Eldorado<br>
            São José do Rio Preto - SP
        </p>

                </section>

            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>


            <!-- Footer-->
            <br>
            <footer class="py-5 bg-dark">
                <div class="container px-4">
                    <p class="m-0 text-center text-white">Copyright &copy; 
                        <br>
                        <br>Arthur Camacho
                        <br>Katia Trevisan
                        <br>Sabrina Gasparelli
                    </p>
                </div>
            </footer>

            <script src="js/lightbox-plus-jquery.min.js"></script>

    </body>
</html>
