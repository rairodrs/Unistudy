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
    <title>Check List</title>
    <link rel="stylesheet" href="styles/checkList.css">
    <link rel="stylesheet" href="styles/btn.css">
    <link rel="stylesheet" href="styles/barraDeNavegacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
    body {
        background: #f9f9f9;
    }
</style>

<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php"; 
require_once "barra.php";
?>
<script src="js/barraDeNavegacao.js"></script>
<body>
<div class="container-wrapper">
    <?php
    // Consultar matérias
    $materiasBanco = "SELECT * FROM materias";
    $materias = $banco->query($materiasBanco);
  
    if ($materias->num_rows > 0) {
        while ($materia = $materias->fetch_object()) {            
            ?>
            <div class="container" data-subject="<?php echo $materia->materiasNome; ?>">
                <div class="select-btn">
                    <span class="btn-text"><?php echo $materia->materiasNome; ?></span>
                    <span class="arrow-dwn">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>

                <ul class="list-items">

                    <?php                                     
                    $materiaID = $materia->materiasID;
                    $conteudosBanco = "SELECT c.*, dc.dataDeConclusao, u.usuarioID 
                                       FROM conteudo c 
                                       LEFT JOIN data_conclusao dc ON c.id = dc.conteudoID
                                       LEFT JOIN usuario u ON u.usuarioID = dc.usuarioID
                                       WHERE c.materiasID = " . $materiaID . " AND (u.usuarioID = " . $_SESSION['userId'] . " OR u.usuarioID IS NULL)";

                    $conteudos = $banco->query($conteudosBanco);

                    if (!$conteudos) {
                        die("Erro na consulta: " . $banco->error);
                    }

                    if ($conteudos->num_rows > 0) {
                        while ($conteudo = $conteudos->fetch_object()) {
                            $id = $conteudo->id;
                            ?>
                            <li class="item <?php if (isset($conteudo->dataDeConclusao)) { echo 'checked'; } ?>" 
                            onclick="concluido(<?php echo $conteudo->id; ?>)">
                            <span class="checkbox">
                                <i class="fa-solid fa-check check-icon"></i>
                            </span>
                            <span class="item-text"><?php echo $conteudo->nome; ?></span>
                        </li>
                            <?php
                        }
                    } else {
                        echo msg_aviso("Conteúdo indisponível");
                    }
                    ?>
                    <script>
                        function concluido(id) {
                            fetch('checklist_dataconclusao.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({ id: id, userId: <?php echo $_SESSION['userId']; ?> })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    console.log('Inserção bem-sucedida:', data);
                                    // Aqui você pode atualizar a interface do usuário, se necessário
                                } else {
                                    console.error('Erro na inserção:', data.message);
                                }
                            })
                            .catch((error) => {
                                console.error('Erro:', error);
                            });
                        }
                    </script>
                </ul>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container-wrapper">
            <div class="container" data-subject="<?php echo msg_aviso("Erro na conexão"); ?>">
                <div class="select-btn">
                    <span class="btn-text"><?php echo msg_aviso("Erro na conexão"); ?></span>
                    <span class="arrow-dwn">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
                <?php
            }
            ?>
    </div>
</div>

<script src="js/materias.js"></script>
<script src="js/barraDeNavegacao.js"></script>

</body>
</html>