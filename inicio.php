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
    <title>UniStudy</title>
    <link rel="stylesheet" href="styles/barraDeNavegacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
       html, body {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

.logo {
    width: 55%;
    height: auto;
 }
    </style>
</head>
<body>
<?php
require_once "barra.php";
?>
<div id="corpo">
    <div class="container">
    <image src="imagens/logoPaginaInicial.png" class="logo"></image>
    </div>

</div>
</body>
</html>
