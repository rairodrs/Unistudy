<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UniStudy</title>
    <link rel="stylesheet" href="styles/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <style>
            @media screen and (max-width:469px){
                .content::before{
                    display: block;
                }
                .imagem{
                    display: none;
                }
                .btn-primary{
                    display: block;
                    border-left: 5px;
                }
    }
           
    </style>
</head>
<body>
<?php

      require_once "includes/banco.php";
      require_once "includes/funcoes.php";
     
      ?>
<div class="container">
        <div class="content first-content">
            <div class="first-column">
                <br></br>
                <br></br>
                <br></br>
                <img class='imagem' src="imagens/UniStudyPNG.png"width="50%">
                <h2 class="title title-primary">Bem-vindo de volta!</h2>
                <p class="description description-primary">Acesse sua conta agora mesmo!</p>
                <a href="entrar.php"><button id="signin" class="btn btn-primary"> <h3>ENTRAR </h3></button></a>
                <br></br>
                <br></br>
                <br></br>
                <br></br>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta!</h2>
                <p class="description description-second" font-size="20%">Preencha seus dados</p>

                <form class="form"  method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" name="nome" id="nome" size="80" maxLength="10">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="usuario" id="usuario" size="80">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" id="senha" size="80">
                    </label>
                   
                 <button class="btn btn-second" type="submit" value="Gravar Usuário">
                    <h3>CADASTRAR</h3>
                    <?php

                     $email = $_POST['usuario'] ?? null;
                     $nomeUsuario = $_POST['nome'] ?? null;
                     $senhaUsuario = $_POST['senha'] ?? null;
                     $erro=0;

                     if(isset($_POST['usuario']) && isset($_POST['nome']) && isset($_POST['senha'])) {
                        if(empty($email) || empty($nomeUsuario) || empty($senhaUsuario)){
                            $erro=1;
                        } else {
                        
                            $emailU = "SELECT * FROM usuario WHERE email = '$email'";
                            $buscaEU = $banco->query(query: $emailU);
                    
                            if($buscaEU->num_rows == 0){
                         
                                $q = "INSERT INTO usuario (email, nomeUsuario, senhaUsuario)
                                      VALUES ( '$email', '$nomeUsuario', AES_ENCRYPT('$senhaUsuario', 'T8ShwZVA3F8fpkMAYZp3aMp8V') )";
                           
                                if($banco->query(query: $q)){
                                    $q = "SELECT usuarioID, email, nomeUsuario, AES_DECRYPT(senhaUsuario, 'T8ShwZVA3F8fpkMAYZp3aMp8V' ) 
                                          AS senhaDescriptografada 
                                          FROM usuario WHERE email = '$email'";
            
                                    $busca = $banco->query(query: $q);
                        
                                    if($busca->num_rows>0){
                                        
                                        $reg = $busca->fetch_object();
                                           
                                        $_SESSION['userId']=$reg->usuarioID;
                                        $_SESSION['nome']=$reg->nomeUsuario;
                                        $_SESSION['email']=$reg->email;
                                        $_SESSION['senha']=$reg->senhaUsuario; 
                                                      
                                        header('Location: inicio.php');                                       
                                    }

                                } else {
                                    $erro=2;
                                }
                            } else {
                                $erro=3;
                            }
                        }
                    }
                    
                    ?>
                </button>
                <br>
                        <div class="erros">
                        <center>
                        <?php
                        if($erro==1){
                            echo msg_erro ("Todos os dados são obrigatórios");
                        }
                        if($erro==2){
                            echo msg_erro("Não foi possível criar o usuário $nomeUsuario");
                        }
                        if($erro==3){
                            echo msg_erro("Email indisponível");
                        }
                        ?>
                        </center>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>