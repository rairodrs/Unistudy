<?php
session_start();
 
if (!isset($_SESSION['userId'])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Material de estudo</title>
 
        <!-- CSS -->
<link rel="stylesheet" href="styles/materialDeEstudo.css">
<link rel="stylesheet" href="styles/barraDeNavegacao.css">  
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    </head>
    <?php
 require_once "includes/banco.php";
 require_once "includes/funcoes.php";
 require_once "barra.php";
 ?>
 <body>

        <div class="container-wrapper">

            <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1pX6Pt4UQ1InMucyY5mGIq5oUPfnvyDQ9?usp=drive_link" target="_blank">Português</a>
            </div>

        <div class="container">
                <a class="select-btn"  href="https://drive.google.com/drive/folders/1q4Yochff49CEY7iYRHQ90bQcqOs6w6Ig?usp=drive_link" target="_blank">Matemática</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/11P9cM4rXGIxjfD-qaM67l7W0CV5SO_vD?usp=drive_link" target="_blank">História</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1zya7gnhwZMLSOqB5DKTBrNIcddgG-m01?usp=drive_link" target="_blank">Biologia</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1IHry3TijQPABdJcZ_ZjL6S77wT14xp7p?usp=drive_link" target="_blank">Química</a>
        </div>
            
         <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1PllWa1IpwHHvhM0nYXsw5fxmT9tdWbNT?usp=drive_link" target="_blank">Geografia</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1kZebcLJqGs0tuj8PYGB4x3q5YpUQhv54?usp=drive_link" target="_blank">Literatura</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1x1dcxxyHqP1Msvnfzq290yMkai2ouect?usp=drive_link" target="_blank">Física</a>   
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1dyNcEAur4x5E4f_64TL9FrEuWS0XqCHm?usp=drive_link" target="_blank">Lingua Estrangeira</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1aBWK5M8jMXt2pw5pd3mzF7-LizWCzlKo?usp=drive_link" target="_blank">Resumos</a>
        </div>

        <div class="container">
                <a class="select-btn" href="https://drive.google.com/drive/folders/1Zme5lFr8q0hByMaUMyoSeWvS0s8kPw7i?usp=drive_link" target="_blank">Simulados</a>
        </div>
</div>
