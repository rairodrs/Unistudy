<?php
session_start();
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "barra.php";

if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senhaAtual = $_POST['SenhaAtual'] ?? null;
    $senhaNova = $_POST['SenhaNova'] ?? null;
    $idUsuario = $_SESSION['userId'];

    if (empty($senhaAtual) || empty($senhaNova)) {
        $erro = 1; 
    } else {
        // Consultar a senha atual do banco
        $q = "SELECT usuarioID, AES_DECRYPT(senhaUsuario, 'T8ShwZVA3F8fpkMAYZp3aMp8V') AS senhaDescriptografada FROM usuario WHERE usuarioID = ?";
        $stmt = $banco->prepare($q);
        
        if (!$stmt) {
            die("Erro na preparação da consulta: " . $banco->error);
        }
        
        $stmt->bind_param('i', $idUsuario); 
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $reg = $resultado->fetch_object();

            if ($senhaNova !== $senhaAtual) {
                if ($reg->senhaDescriptografada === $senhaAtual) {
                    // Preparar a atualização da senha
                    $alterar = "UPDATE usuario SET senhaUsuario = AES_ENCRYPT(?, 'T8ShwZVA3F8fpkMAYZp3aMp8V') WHERE usuarioID = ?";
                    $stmt = $banco->prepare($alterar);
                    
                    if (!$stmt) {
                        die("Erro na preparação da atualização: " . $banco->error);
                    }

                    $stmt->bind_param('si', $senhaNova, $idUsuario);
                    if ($stmt->execute()) {
                        $erro = 4; 
                    } else {
                        $erro = 5; 
                    }
                } else {
                    $erro = 2; // Senha atual incorreta
                }
            } else {
                $erro = 6; // Senhas iguais
            }
        } else {
            $erro = 2; // Senha atual incorreta
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/perfil.css">
    <style>
        .content {
           position: relative; 
           height: 100vh;  
           left: 295px; 
           width: calc(100% - 295px); 
           transition: all 0.5s ease; 
           display: grid;
           place-items: center;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .form {
            max-width: 400px;
            margin: 300px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .label-input {
            display: block;
            margin-bottom: 20px;
        }
        .label-input input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .label-input input:focus {
            border-color: #3498db;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .erros {
            margin-top: 10px;
            color: #7f8c8d;
            text-align: left;
        }
        a {
            display: block;
            margin-top: 10px;
            text-align: left;
            text-decoration: none;
            color: #7f8c8d;
            font-size: 14px;
            transition: color 0.3s;
            padding: 3px;
        }
        a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>
<div class="content">
<form class="form" method="POST">
    <label class="label-input" for="SenhaAtual">
        <input type="password" placeholder="Senha Atual" name="SenhaAtual" id="SenhaAtual" required>
    </label>
    <label class="label-input" for="SenhaNova">
        <input type="password" placeholder="Senha Nova" name="SenhaNova" id="SenhaNova" required>
    </label>
    <div>
        <button class="btnalteracao btnaltercao-second" type="submit">Alterar a Senha</button>
        <div class="erros">
            <?php
            if ($erro == 1) {
                echo msg_erro("Todos os dados são obrigatórios");
            }
            if ($erro == 2) {
                echo msg_erro("Senha Atual incorreta");
            }
            if ($erro == 4) {
                echo msg_sucesso("Senha Alterada com sucesso");
            }
            if ($erro == 5) {
                echo msg_aviso("Erro ao atualizar, tente novamente");
            }
            if ($erro == 6) {
                echo msg_aviso("As senhas não podem ser iguais");
            }
            ?>
        </div>
    </div> 
    <a href="perfil.php">Voltar</a>
</form>
</div>
</body>
</html>