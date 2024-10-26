<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php";
 
if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}
?>
 <script src="js/barraDeNavegacao.js"></script>
    <link rel="stylesheet" href="styles/barraDeNavegacao.css">
<nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="imagens/logoMenu.jpg" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">UniStudy</span>
                    <span class="profession">Amigo dos vestibulandos</span>
                </div>
            </div>
            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <br>
                    <li class="nav-link">
                        <a href="inicio.php">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="cronograma.php">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">Cronograma</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="checklist.php">
                            <i class='bx bx-list-check icon'></i>
                            <span class="text nav-text">Check-list</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="materialDeEstudo.php">
                            <i class='bx bx-book-content icon'></i>
                            <span class="text nav-text">Material de estudo</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="professores.php">
                            <i class='bx bxl-youtube icon' ></i>
                            
                            <span class="text nav-text">Recomendações</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <br><br>
        <div class="bottom-content">
        <li class="">
            <a href="desconectando.php">
                <i class="bx bx-log-out icon"></i>
                <span class="text nav-text">Sair</span>
            </a>
        </li>

            <li class="">
                <a href="perfil.php">
                    <i class="bx bx-user icon"></i>
                    <span class="text nav-text">
                    <?php
                    echo $_SESSION['nome'];
                    ?>
                    </span>
                </a>
            </li>
        </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
        <div class="bottom-content" style="">
        <li class="">
            <a href="avaliacao.php" id="open-modal">
                <i class="bx bx-smile icon"></i>
                <span class="text nav-text">Avaliar</span>
            </a>
        </li>
        <div class="bottom-content">
         <li class="">
          <span class="text nav-text">
           
          </span>
         </li>
        </div>
    </nav>
</body>
</html>