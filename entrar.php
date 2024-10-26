<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
            
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrar</title>
    <link rel="stylesheet" href="styles/entrar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <style>
            .first-column .imagem {
                width: 70%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <br></br>
                <br></br>
                <br></br>
                <img class='imagem' src="imagens/unistudyPNG.png">
                <p class="description description-primary">O amigo dos vestibulandos!</p>
                <a href="index.php"><button id="signin" class="btn btn-primary"> <h3>CADASTRAR </h3></button></a>
                <br></br>
                <br></br>
                <br></br>
                <br></br>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Bem-vindo de volta!</h2>
                <p class="description description-second" font-size="20%">Preencha seus dados</p>
                <form class="form" method="POST">
                   
                <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="usuario" id="usuario" size="80">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" id="senha" size="80">
                    </label>
                   
                    <button class="btn btn-second">
<?php

  require_once "includes/banco.php";
  require_once "includes/funcoes.php";
  

 
 $email = $_POST['usuario'] ?? null;
 $senha = $_POST['senha'] ?? null;
 $erro=0;

    if(isset($_POST['usuario']) && isset($_POST['senha'])) {
        if(empty($email) || empty($senha)){
            $erro=1;
        } else {
            
            $q = "SELECT usuarioID, email, nomeUsuario, AES_DECRYPT(senhaUsuario, 'T8ShwZVA3F8fpkMAYZp3aMp8V' ) AS senhaDescriptografada FROM usuario WHERE email = '$email'";
            
            $busca = $banco->query($q);

        if($busca->num_rows>0){
            
            $reg = $busca->fetch_object();

            if($reg->senhaDescriptografada===$senha){   
                $_SESSION['userId'] = $reg->usuarioID;
                $_SESSION['nome']=$reg->nomeUsuario;
                $_SESSION['email']=$reg->email;
                $_SESSION['senha']=$reg->senhaUsuario;               
                header('Location: inicio.php');
            }else{
                $erro=2;
                $to = $email;
                $subject = "Restauração de senha: Unistudy";
                $message = "Houve uma tentativa de acesso a sua conta, sua senha é $reg->senhaDescriptografada. \n Caso não tenha solicitado essa operação, é recomendado a mudança de senha.";
                $headers = "De: unistudy.vestibulares@gmail.com\r\n";

                $mail = new PHPMailer(true);

                   try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'unistudy.vestibulares@gmail.com'; // Seu endereço de e-mail
        $mail->Password = 's g s d b m z y x t p a z h b e'; // Sua senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatários
        $mail->setFrom($reg->email, $reg->nomeUsuario);
        $mail->addAddress($to); // Adiciona um destinatário

        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message); 
        $mail->AltBody = strip_tags($headers); 

       
        $mail->send();
    } catch (Exception $e) {
        echo "Falha ao enviar o e-mail. Erro: {$mail->ErrorInfo}";
    }
            }
        }else{
            $erro=3;
        }
             
        }
}
 
?>
      <h3>ENTRAR<h3>  
                        </button>
                        <br>
                        <div class="erros">
                        <center>
                        <?php
                        if($erro==1){
                            echo msg_erro ("Todos os dados são obrigatórios");
                        }
                        if($erro==2){
                            echo msg_erro("Senha Inválida");
                            echo msg_aviso("Sua senha foi enviada via email!");
                        }
                        if($erro==3){
                            echo msg_erro("Usuario não existe");
                        }
                        ?>
                        </center>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>