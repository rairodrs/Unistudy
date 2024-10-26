<?php
session_start();
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "barra.php";

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
    <title>Avaliação</title>
    <script src="js/avaliacao.js" defer></script>
    <link rel="stylesheet" href="styles/avaliacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="modal" id="rating-modal">
    <div class="modal-content">
    <a href="inicio.php">
        <span class="close" id="close-modal" style="text-align=right;">&times;</span>
    </a>
        <h2>Avalie</h2>
        <form id="rating-form" action="salvar_avaliacao.php" method="POST">
            <input type="hidden" id="usuarioID" name="usuarioID" value="<?php echo $_SESSION['userId']; ?>" />

            <div class="star-rating">
                <label for="star1" class="star">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star2" class="star">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star3" class="star">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star4" class="star">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star5" class="star">&#9733;</label>
                <input type="radio" id="star5" name="rating" value="5" required />
            </div>
            <div>
                <button type="submit">Enviar Avaliação

                </button>
                <div class="erros"></div>
            </div>
        </form>
    </div>
</div>

</body>
</html>