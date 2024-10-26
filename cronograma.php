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
    <title>Cronograma</title>
    <link rel="stylesheet" href="styles/cronograma.css">
    <link rel="stylesheet" href="styles/barraDeNavegacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <script src="js/barraDeNavegação"></script>
<div class="content">
<main class="table">
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th><big><big><i class='bx bx-timer'></i></big></big></th>
                        <th>Segunda</th>
                        <th>Terça</th>
                        <th>Quarta</th>
                        <th>Quinta</th>
                        <th>Sexta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dias = ['seg', 'ter', 'qua', 'qui', 'sex'];
                    $horarios = ['manha', 'tarde', 'noite', 'extra'];
                    $linha = 0;

                    foreach ($horarios as $horario) {
                        $classe = '';
                        if ($linha % 4 == 0) {
                            $classe = 'primeira';
                        } elseif ($linha % 4 == 1) {
                            $classe = 'segunda';
                        } elseif ($linha % 4 == 2) {
                            $classe = 'terceira';
                        } else {
                            $classe = 'quarta';
                        }

                        echo "<tr class='$classe'>";
                        echo "<td class='horario'>" . ucfirst($horario) . "</td>";

                        foreach ($dias as $dia) {
                            $query = "SELECT materiaNome FROM cronograma WHERE diaSemana='$dia' AND horario='$horario'";
                            $busca = $banco->query($query);
                            $imprimir = $busca->fetch_object();
                            echo "<td><div class='conteudo'>" . ($imprimir ? $imprimir->materiaNome : 'N/A') . "</div></td>";
                        }

                        echo "</tr>";
                        $linha++;
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
</body>
</html>