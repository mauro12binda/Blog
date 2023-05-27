<?php
session_start();

$_SESSION['login'] = true;

//Horas da Africa-Mocambique
date_default_timezone_set('Africa/Maputo');

//Conexao com o banco de dados
 try{
     $pdo = new PDO('mysql:host=localhost;dbname=projecto', 'root', '');
 }catch(Exception $e){
      echo "<h2>Erro ao conectar</h2>";
 }


 //Dados do admin

   







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link do font-awesome -->
    <script src="https://kit.fontawesome.com/83f5ffa4ac.js" crossorigin="anonymous"></script>
    
    <!-- icon da nossa pagina -->
    <link rel="icon" href="img/istockphoto-1222820573-170667a.jpg">

    <!-- Link do css -->
    <link rel="stylesheet" href="css/style.css">

    <style>

        .sucesso,.erro{
            width:100%;
            height:30px;
            padding:5px;
            background-color:#4caf50;
            margin:none;
            text-align:center;
            color:white;
            margin-bottom:7px;
        }
        .erro{
            background-color: #f44336;
        }
        </style>
    <title>Login</title>

    
</head>
<body>


 
    <div class="box">
        <h3><span>Blog</span>Notícias</h3>
        <?php

if(isset($_POST['acao'])){
    
    $user = $_POST['user_name'];
    $password = $_POST['password'];

      $sql = $pdo->prepare("SELECT * FROM `admin_` WHERE (user_adimn=? and senha=?)");
      $sql->execute(array($user,$password));


        if($sql->rowCount() == 1){
           
           sleep(5);
           print "<p class='sucesso'>Seja bem vindo!<p>";
           header('Location: ../Painel/index.php');

        }else{
           print "<p class='erro'>User ou Senha incorreto!<p>";
        }




  }

        ?>
        <form method="post">
            <label for="nome">User:</label>
            <i class="fa-solid fa-user-lock"></i> <input type="text" name="user_name" placeholder="* User" class="input">
            <label for="password">Password:</label>
            <i class="fa-solid fa-lock"></i><input type="password" name="password" placeholder="* Password" class="input">
  
            <button type="submit" name="acao" class="input">Enviar</button>
        </form>
        <a href="#">English</a>
        <a href="#">Português</a>
        <a href="#">Alemão</a>
        <a href="#">Francês</a>
    </div>

  



<!-- Link do jQuery -->
<script src="js/jQuery.js"></script>
<script type="text/javascript" src="js/function.js">
</script>
 
    
</body>
</html>
