<?php
session_start();
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "barra.php";
require_once "rodape.php";

if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}


$userId = $_SESSION['userId'];
$query = "SELECT nomeUsuario, email FROM usuario WHERE usuarioID = ?";
$stmt = $banco->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_object();

//progressp
$progressoQuery = "SELECT COUNT(*) AS total, SUM(CASE WHEN dataDeConclusao IS NOT NULL THEN 1 ELSE 0 END) AS concluido FROM data_conclusao WHERE usuarioID = ?";
$stmt = $banco->prepare($progressoQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$progressoResult = $stmt->get_result()->fetch_object();
$total = $progressoResult->total;
$concluido = $progressoResult->concluido;

$percentual = $total > 0 ? ($concluido / $total) * 100 : 0;
?>
<?php
$usuario_id = $_SESSION['userId'];
$query = "
SELECT 
    COUNT(conteudo.id) AS total, 
    COUNT(data_conclusao.conteudoID) AS completados 
FROM 
    conteudo 
LEFT JOIN 
    data_conclusao ON conteudo.id = data_conclusao.conteudoID AND data_conclusao.usuarioID = '$usuario_id'
";

$result = $banco->query($query);
$data = $result->fetch_assoc();

$total = $data['total'];
$completados = $data['completados'];

// Calcula a porcentagem de progresso
$progresso = $total > 0 ? ($completados / $total) * 100 : 0;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - UniStudy</title>
    <link rel="stylesheet" href="styles/perfil.css">
    
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($user->nomeUsuario); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($user->email); ?></p>
<br>
    <h2>Progresso</h2>
        <div class="barra-progresso">
            <div class="progresso" style="width: <?php echo round($progresso); ?>%; background-color: #4070f4;"><?php echo round($progresso); ?>%</div>
        </div>

        <br>
    <h2>Atividades Recentes</h2>
    <ul>
        <?php
        $atividadesQuery = "SELECT nome, dataDeConclusao FROM conteudo c JOIN data_conclusao dc ON c.id = dc.conteudoID WHERE dc.usuarioID = ? ORDER BY dc.dataDeConclusao DESC LIMIT 5";
        $stmt = $banco->prepare($atividadesQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $atividadesResult = $stmt->get_result();

        if ($atividadesResult->num_rows > 0) {
            while ($atividade = $atividadesResult->fetch_object()) {
                echo "<div class='conteudoModificado'>" . htmlspecialchars($atividade->nome) . " concluído em " . date('d/m/Y', strtotime($atividade->dataDeConclusao)) . "</div>";
            }
        } else {
            echo "<div class='conteudoModificado'>Nenhuma atividade recente.</div>";
        }
        ?>
    </ul> 
    <br>
    <a href="alterarSenha.php" style="text-decoration:none;">
        <button class="btn btn-second" type="submit" name="acao" value="mostrarFormulario">Alterar Senha</button>
        <br>
    </a>
</body>
</html>