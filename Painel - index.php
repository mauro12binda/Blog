<?php
//Horas da Africa-Mocambique
date_default_timezone_set('Africa/Maputo');

session_start();






//Conexao com o banco de dados
 try{
     $pdo = new PDO('mysql:host=localhost;dbname=projecto', 'root', '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(Exception $e){
      echo "<h2>Erro ao conectar</h2>";
 }

   //Selecao dos valores no banco de daos para trazer ate os text area
   $image = $pdo->prepare("SELECT * FROM `noticia`");
   $image->execute();
   $info = $image->fetch()['noticia'];


   //Captura dos dados do sobre
   $sql = $pdo->prepare("SELECT * FROM `sobre`");
   $sql->execute();
   $sobre = $sql->fetch()['sobre'];


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






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link do font-awesome -->
    <script src="https://kit.fontawesome.com/83f5ffa4ac.js" crossorigin="anonymous"></script>
    
    <!-- Link do site -->
    <link rel="icon" href="img/istockphoto-1222820573-170667a.jpg">


    <!-- Link do font-awesome -->
    <script src="https://kit.fontawesome.com/83f5ffa4ac.js" crossorigin="anonymous"></script>   

    <!-- Link do css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Painel de controle</title>

    <style>

h3 > .sucesso,.erro{
            width:100%;
            max-width:500px;
            height:35px;
            padding:7px;
            background-color:#4caf50;
            margin:none;
            text-align:center;
            color:white;
            margin-bottom:7px;
            position:relative;
            top:-5px;
            left:50%;
            transform: translateX(-50%);
            font-size:15px;
            font-weight: normal;
        }
        .erro{
            background-color: #f44336;
        }

        .bt{
            width: 30%;
            height: 30px;
            cursor: pointer;
            background-color:#204dcc;
            border:none;
            border:1px solid #204dcc;
            color:white;
            font-size:16px;
            font-weight:normal;
            border-radius:6px;
            transition:1s;
            margin-top:15px;
            margin-bottom:50px;

        }
        .bt:hover{
            background-color:#0747fa;
        }

        nav button{
            width:20px;
            height:30px;
            border:1px solid #fff;
            border-radius:2px;
            background-color:#fff;
            cursor: pointer;
            transition:1s;
        }
        nav button i{
            font-size:15px;
        }
        nav button i:hover{
            color:#204dcc;
        }


</style>
</head>
<body>

    <!-- trabalhando com o logout com o php -->
    <?php
     if(isset($_POST['logout'])){
        session_start();
        session_unset();
        session_destroy();




         header('Location: ../Login/index.php');
     }


        ?>
 

    <!-- Side bar escondida -->
    <nav>
        <form method="post">
            <!-- <input type="text" name="logout";> -->
        <div class="btn close"><button type="submit" name="logout"><i class="fa-solid fa-right-from-bracket"></i></button><p>log out</p></div>
    </form>
        <ul>
        <li>
            <a href="#posts" >POSTS</a>
        </li>
        <li>
            <a href="#equipe">EQUIPE</a>
        </li>
        <li>
            <a href="#listar">LISTA EQUIPE</a>
        </li>
    </ul>
    </nav>


    <!-- Header mobile -->
    <header>
        <h3><span>Blog</span>Notícias</h3>
    </header><!-- FInal do Header mobile -->

  


     <div class="painel">
        <h3><span>Painel</span> de Controle</h3><i class="fa-solid fa-gear"></i></i>
        <div class="img-perfil"><i class="fa-solid fa-caret-up"></i></div>
     </div><!--painel de controle com as animacoes -->

     

     <div class="menu-toggle" > 
        <i class="fa-sharp fa-regular fa-gear-code" style="font-size: 20px;"></i>
     </div>


<!-- Sessao de teste contem todos os textarea -->
    <section class="teste hide" id="posts">

        <h3>Posts</h3>
        <h4 style="display:none;padding-top:7px;width:100%;border-radius:;max-width:500px;height:35px;background-color:#4caf50;text-align:center;color:white;"></h4>
        <!-- Div da noticia -->
        <div class="row">

        <?php

            if(isset($_POST['btn-noticia'])){
                $post = $_POST['noticia-info'];

                $pdo->exec("DELETE FROM `noticia`");

                $info_noticia = $pdo->prepare("INSERT INTO `noticia` VALUES (null,?)");
                $info_noticia->execute(array($post));

                //Captura dos dados do sobre
                $image = $pdo->prepare("SELECT * FROM `noticia`");
                $image->execute();
                $info = $image->fetch()['noticia'];
    
}
            
           
            
        ?>
            <h3>Noticia</h3>
            <form method="post">
                    <textarea placeholder="Noticia" name="noticia-info"><?php echo $info; ?></textarea>
                    <button type="submit" name="btn-noticia" class="bt">Enviar</button>
                </form>
            </div>

            <!-- Div da imagem -->
            <div class="row">
              <?php 
                // Pegando as imagens do nosso banco de dados
                $img_post = $pdo->prepare("SELECT * from img");
                $img_post->execute();
                $img_final = $img_post->fetch()['nome_img'];
               ?>

      
     <h3 style="text-align:right">Imagem</h3>
    <form method="post">
            <textarea placeholder="Imagem" name="imagem"><?php echo $img_final;  ?></textarea>
            <button type="submit" name="btn-img" class="bt">Enviar</button>
        </form>
    </div>
    <!-- Fim da primeira coluna de imagem e noticias -->



    <!-- Segunda coluna de noticias -->
    <div class="row">
        <?php

            if(isset($_POST['btn-noticia_2'])){

                $noticia_2 = $_POST['noticia-info-2'];

                $pdo->exec(" DELETE FROM noticia_2");

                $noti = $pdo->prepare("INSERT INTO `noticia_2`  VALUES (null,?)");
                $noti->execute(array($noticia_2));

                //Selecao da informacao do banco de dados
                $not = $pdo->prepare(" SELECT * FROM `noticia_2`");
                $not->execute();
                $notinfo = $not->fetch()['noticia_2'];
    
            }
        ?>
            <h3>Noticia</h3>
            <form method="post">
                    <textarea placeholder="Noticia" name="noticia-info-2"><?php echo $notinfo ; ?></textarea>
                    <button type="submit" name="btn-noticia_2" class="bt">Enviar</button>
                </form>
            </div>

            <!-- Div da imagem -->
            <div class="row">
              <?php 
                // Pegando as imagens do nosso banco de dados
                $img_post = $pdo->prepare("SELECT * from img");
                $img_post->execute();
                $img_final = $img_post->fetch()['nome_img'];
               ?>

      
    <h3 style="text-align:right">Imagem</h3>
    <form method="post">
            <textarea placeholder="Imagem" name="imagem"><?php echo $img_final;  ?></textarea>
            <button type="submit" name="btn-img" class="bt">Enviar</button>
        </form>
    </div>
    <!-- Final da segunda coluna de noticias -->




    <!-- Inicio da terceira coluna de noticias -->
    <div class="row">

        <?php

            if(isset($_POST['btn-noticia-3'])){
                $noticia_3 = $_POST['noticia__3'];
                 $pdo->exec("DELETE FROM `noticia_3`");
                 $not_3 = $pdo->prepare("INSERT INTO `noticia_3` VALUES (null,?)");
                 $not_3->execute(array($noticia_3));
                 //Mostrando os dados da terceira coluna de noticias
                 $Not = $pdo->prepare("SELECT * from `noticia_3`");
                 $Not->execute();
                 $Not_1 = $Not->fetch()['noticia_3'];

              
    
                }
            
           
            
        ?>
            <h3>Noticia</h3>
            <form method="post">
                    <textarea placeholder="Noticia" name="noticia__3"><?php echo  $Not_1 ?></textarea>
                    <button type="submit" name="btn-noticia-3" class="bt">Enviar</button>
                </form>
            </div>

            <!-- Div da imagem -->
            <div class="row">
              <?php 
                // Pegando as imagens do nosso banco de dados
                $img_post = $pdo->prepare("SELECT * from img");
                $img_post->execute();
                $img_final = $img_post->fetch()['nome_img'];
               ?>

      
    <h3 style="text-align:right">Imagem</h3>
    <form method="post">
            <textarea placeholder="Imagem" name="imagem"><?php echo $img_final;  ?></textarea>
            <button type="submit" name="btn-img" class="bt">Enviar</button>
        </form>
    </div>
    <!-- Final da terceira coluna de noticias -->





    <!-- Inicio da quarta coluna de noticias -->
    <div class="row">

        <?php

            if(isset($_POST['btn-noticia-4'])){
                $not_4 = $_POST['noticia_4'];


                $pdo->exec("DELETE FROM `noticia_4`");
                $iiii = $pdo->prepare("INSERT INTO `noticia_4` VALUES (null,?)");
                $iiii->execute(array($not_4));

                //Mostrando os dados da quarta coluna de noticias
                $Iv = $pdo->prepare("SELECT * FROM `noticia_4`");
                $Iv->execute();
                $iv = $Iv->fetch()['noticia_4'];


    
}
            
           
            
        ?>
            <h3>Noticia</h3>
            <form method="post">
                    <textarea placeholder="Noticia" name="noticia_4"><?php echo $iv; ?></textarea>
                    <button type="submit" name="btn-noticia-4" class="bt">Enviar</button>
                </form>
            </div>

            <!-- Div da imagem -->
            <div class="row">
              <?php 
                // Pegando as imagens do nosso banco de dados
                $img_post = $pdo->prepare("SELECT * from img");
                $img_post->execute();
                $img_final = $img_post->fetch()['nome_img'];
               ?>

      
    <h3 style="text-align:right">Imagem</h3>
    <form method="post">
            <textarea placeholder="Imagem" name="imagem"><?php echo $img_final;  ?></textarea>
            <button type="submit" name="btn-img" class="bt">Enviar</button>
        </form>
    </div>
    <!-- Final da quarta coluna de noticias -->


    





            

            <!-- Coluna do sobre -->
            <div class="row">
            <?php



            if(isset($_POST['btn-sobre'])){
                $noticia = $_POST['sobre_noticia'];
                $pdo->exec("DELETE FROM  `sobre` ");
                $noticia_info = $pdo->prepare("INSERT INTO `sobre` VALUES (null,?)");
                $noticia_info->execute(array($noticia));
                //Captura dos dados do sobre
                $sql = $pdo->prepare("SELECT * FROM `sobre`");
                $sql->execute();
                $sobre = $sql->fetch()['sobre'];

            }

            ?>
                <h3 style="text-align:right">Sobre</h3>
                <form method="post">
                        <textarea placeholder="Sobre" name="sobre_noticia" style="position:relative;left:50%;trasnform:translateX(-50%)"><?php echo $sobre; ?></textarea>
                        <button name="btn-sobre" class="bt" style="position:relative;left:85%;trasnform:translateX(-80%)">Enviar</button>
                    </form>
                </div>  
                
                <!-- Final da coluna sobre -->
                



                <!-- Inicio do formulario de equipe -->
                
        <div class="z">
            <div class="equipe">
                <h3>Equipe</h3>
           

            <div class="form-equipe" id="equipe">


            <?php
                    if(isset($_POST['acao'])){
                         $nome = $_POST['nome'];
                         $desc = $_POST['descricao'];
                         $password = md5($_POST['password']);
                         $momento_registro = date('Y-m-d h:i:s');

                          $sql = $pdo->prepare("INSERT INTO membro_equipe (id_membro_equipe,nome,descricao,senha,momento_registro) VALUES (null,?,?,?,?)");
                          $sql->execute(array($nome,$desc,$password,$momento_registro));

                            if($sql == true){

                                print "<p class='sucesso'>Membro Cadastrado!</p>";
                            }

                       

                    }
                    ?>
                <h3 style="display:none;padding-top:7px;width:100%;margin-bottom:2px;border-radius:6px 6px 0 0;border-radius:;max-width:500px;height:35px;background-color:#4caf50;text-align:center;color:white"></h3>
                <form method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="* Nome membro" class="input">
                    <label for="descricao">Descricao:</label>
                    <input type="text" name="descricao" placeholder="* Descricao"  class="input">
                    <label for="senha">Password:</label>

                    <input type="password" name="password" placeholder="* Password" class="input">
                    <button type="submit" name="acao" class="input" style="background-color:#204dcc;color:white;width:20%;cursor:pointer;border:none;font-size:16px;position:static;display:inline-block;text-align:center">Cadastrar</button>
                </form>
            </div>

            <div class="equipe-slect" id="listar">
            <h3>Listar Equipe</h3>

            <div class="form-equipe-list" id="#sobre">
                <table>
                    <tr>
                      <th>Id:</th>
                      <th>Nome Membro:</th>
                      <th>Descricao</th>
                      <th>Excluir:</th>
                    </tr>


                    <?php


                        $sql = $pdo->prepare("SELECT * FROM `membro_equipe`");
                        $sql->execute();
                        $info = $sql->fetchAll();


                            foreach($info as $key => $value){

                         
                    ?>
                    <form method="post">
                    <tr>
                      <td class="sair"><?php echo $value['id_membro_equipe']?></td>
                      <td class="sair"><?php echo $value['nome']?></td>
                      <td class="sair"><?php echo $value['descricao']?></td>
                      <td class="sair"><button value="Excluir" class="btn-excluir" name="excluir" id_membro="<?php echo $value['id']?>">Excluir</button></td>
                    </tr>

                    <?php    } ?>
                 </form>


                 <?php

                    if(isset($_POST['excluir'])){
                          $excluir = $pdo->prepare(" DELETE FROM `membro_equipe` WHERE id_membro_equipe=1");
                          $excluir->execute(array($_POST['excluir']));
                    }


                ?>

                

                    </table>
              </div>
            </div><!-- Fim div select group -->
         </div><!-- Fim classe equipe -->
        </div><!-- Fim classe z -->

        <!-- Final do formulario de contato -->
    
    </section>










<!-- Link do jQuery -->
<script src="js/jQuery.js"></script>
<script type="text/javascript" src="js/novo.js">
</script>
 
    
</body>
</html>
