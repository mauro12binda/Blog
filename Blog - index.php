<?php
//Conexao com o banco de dados
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projecto', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
     echo "<h2>Erro ao conectar</h2>";
}


//Trazendo os dados do nosso banco de dados
$image = $pdo->prepare("SELECT * FROM `noticia`");
$image->execute();
$info = $image->fetch()['noticia'];


//Mostrangem dos dados da segunda fileira de noticias
$not = $pdo->prepare(" SELECT * FROM `noticia_2`");
$not->execute();
$notinfo = $not->fetch()['noticia_2'];

//Mostrando os dados da terceira coluna de noticias
$Not = $pdo->prepare("SELECT * from `noticia_3`");
$Not->execute();
$Not_1 = $Not->fetch()['noticia_3'];

//Mostrando os dados da quarta coluna de noticias
$Iv = $pdo->prepare("SELECT * FROM `noticia_4`");
$Iv->execute();
$iv = $Iv->fetch()['noticia_4'];


//Captura dos dados do sobre
$sql = $pdo->prepare("SELECT * FROM `sobre`");
$sql->execute();
$sobre = $sql->fetch()['sobre'];


//Selecao das nossas imagens em nossos banco de dodos
$img = $pdo->prepare("SELECT * FROM `img`");
$img->execute();
$imgs = $img->fetch()['nome_img'];


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- icon do site -->
    <link rel="icon" href="img/istockphoto-1222820573-170667a.jpg" style="border-radius: 20px;width: 40px;height:40px">

    <!-- Link do font-awesome -->
    <script src="https://kit.fontawesome.com/83f5ffa4ac.js" crossorigin="anonymous"></script>   

    <!-- Link do css -->
    <link rel="stylesheet" href="css/teste.css">

    <style>
  

</style>
    <title>Blog Home</title>
</head>
<body>

   

<!-- Inicio da navbar -->
    <nav>
        <ul>
            <li>
                <a href="" target="_blank"><i class="fa fa-facebook "></i></a>
            </li>

            <li>
                <a href=""><i class="fa fa-twitter "></i></a>
            </li>

            <li>
                <a href=""><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href=""><i class="fa fa-pinterest"></i></a>
            </li>
        </ul>

        <div class="mobile">
            <ul>
            <i class="fa-solid fa-bars"></i>
            </ul>
        </div>
        
    </nav><!-- Fim navbar -->
    


<!-- Header -->
    <header>
        <div class="logo"><h3><span>Blog</span> Noticia</h3></div>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#noticias">Noticias</a>
                </li>

                <li>
                    <a href="#sobre">Sobre</a>
                </li>

                <li>
                    <a href="#contato">Contato</a>
                </li>
            </ul>
    </header><!-- Fim do Header -->


    <section class="nav-mobile">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#noticias">Noticias</a>
            </li>


            <li>
                <a href="#contato">Contato</a>
            </li>


            <li>
                <a href="#sobre">Sobre</a>
            </li>

            
        </ul>
        
    </section>

   

 
    



<!-- Inicio main -->
   <section class="main">
      <div class="container">
            <div class="slider">
            </div><!-- Slider-->



            <!-- Noticia numero-1 -->
            <div class="main-content">
                <p><?php echo $info; ?></p>
            </div><!-- main content-->

            <div class="main-content"><?php echo $imgs?></div><!-- main content-->
            <!-- Final Noticia numero-1 -->


            <!-- Segundo-content -->
            <div class="main-content">
                <img src="img/pexels-pavel-danilyuk-8294624.jpg" style="width: 100%;height:auto; background-size:cover;background-position:center;background-repeat: no-repeat;">
            </div><!-- main content-->


            <div class="main-content" style="order:2">
                <p><?php echo $notinfo; ?></p>
            </div><!-- main content-->

            <div class="main-content">
                <p>  <?php echo $Not_1 ; ?></p>
            </div><!-- main content-->

            <div class="main-content">
                <img src="img/pexels-pixabay-73871.jpg" style="width: 100%;height:auto; background-size:cover;background-position:center;background-repeat: no-repeat;">
            </div><!-- main content-->   
            
            <div class="main-content">
                <img src="img/pexels-muamer-ramovic-15639288.jpg" style="width: 100%;height:auto; background-size:cover;background-position:center;background-repeat: no-repeat;">
            </div><!-- main content--> 
            
            <div class="main-content">
                <p><?php echo $iv;  ?></p>
            </div><!-- main content-->

            
      </div><!-- container-->
   </section><!-- Final do main -->




    <section class="contato" id="sobre">
                <div class="box-contato">

                        <div class="contato-left">
                            <div class="img-left">
                                <p>Blog info tech</p>
                            </div><!-- img -->
                                <div class="conteudo-left">
                                    <p>Maurobinda004@gmail.com</p>
                                </div><!-- conteudo left -->
                        </div><!-- contato left -->


                       




                    <div class="contato-right">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>

                       <p><?php echo $sobre; ?></p>

                      
                        
                    </div><!-- conteudo right -->
                </div><!-- Box contato -->
    </section><!-- Contato -->



    <!-- Contato v2 -->
    <section class="contato-v2" id="contato">
        <div class="v2-info">
            <h3>Contato</h3>
            <p>+258 844744200 </p>
            <p>Maurobinda004@gmail.com</p>
            <i class="fa-brands fa-skype"></i>
        </div>

        <div class="box">
            <form>
                <input type="text" nome="nome" placeholder="* Nome" class="w50">
                <input type="tel" nome="nome" placeholder="* Email" class="w50">
                <textarea placeholder="* Mensagem" class="w100"></textarea>
                <input type="submit" class="w50">
            </form>
        </div>

    </section>


    <section class="whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
    </section>





   <footer>
          <img src="img/istockphoto-1222820573-170667a.jpg">
   </footer>
    <!-- Footer -->


 <script src="js/jQuery.js" ></script>
 <script src="js/nov.js">

 </script>   
</body>
</html>
