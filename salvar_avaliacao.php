<?php
session_start();
require_once "includes/banco.php"; 

if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST['usuarioID'];
    $nota = $_POST['rating'];

    if (is_numeric($nota) && $nota >= 1 && $nota <= 5) {
    
        $q = "INSERT INTO avaliacoes (usuarioID, nota) VALUES (?, ?)";

        if ($stmt = $banco->prepare($q)) {
            $stmt->bind_param("ii", $usuarioID, $nota);
            
    
            if ($stmt->execute()) {
            
                echo "Avaliação salva com sucesso!";
                 header("Location: inicio.php");
            } else {
                echo "Erro ao salvar a avaliação: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $banco->error;
        }
    } else {
        echo "Nota inválida. Deve ser entre 1 e 5.";
    }
}

$banco->close();
?>