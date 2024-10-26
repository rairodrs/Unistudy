<?php 
session_abort();
echo '<script>sessionStorage.clear();</script>'
?>
    <!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...</title>
    <link rel="stylesheet" href="styles/desconectando.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
 
    ?> 
   
    <div class="overlay">
        <div class="loading-box">
            <div class="container">
            <?php
        
        ?>
                <div class="content first-content">
                    <div class="first-column">
                    <br><br>
                        <img src="imagens/unistudyDesconectado.png"UniStudy Logo>
                        <h3>Aguarde enquanto desconectamos</h3>
                        <p class="description description-second">Lamentamos qualquer transtorno!</p>
                        <br>
                        <center><div class="spinner-border"></div></center>
                        <?php
                        if(!isset( $_SESSION['userId'])) { 
                            $_SESSION['userId']="";
                            $_SESSION['nome']="";
                            $_SESSION['email']="";
                            $_SESSION['senha']="";
                            
                            echo '<script>
                          setTimeout(function() {
                                window.location.href = "desconectado.php";
                            }, 3000); // 3000 milissegundos = 3 segundos
                          </script>';
                } else {
                    echo msg_erro("não foi possível desconectá-lo " . $_SESSION['nome']);
                }
                        ?>
                        <br>
                        <br>
                        
                    </div>    
                </div>
            </div>
        </div>
    </div>
</body>
