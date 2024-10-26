<?php
session_start();
require_once "includes/banco.php"; 
 
if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id']; 
$userId = $data['userId']; 

$sql = "INSERT INTO data_conclusao (conteudoID, usuarioID, dataDeConclusao) VALUES (?, ?, NOW())";

//prepara a consulta no banco
$stmt = $banco->prepare($sql);
//o "ii" indica que serão dois valores inteiros, nesse caso (id e userId)
$stmt->bind_param("ii", $id, $userId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $banco->error]);
}

$stmt->close();
$banco->close();

?>