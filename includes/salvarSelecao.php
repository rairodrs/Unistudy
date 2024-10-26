<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conteudoID = isset($_POST['conteudoID']) ? intval($_POST['conteudoID']) : 0;
    $checked = isset($_POST['checked']) ? intval($_POST['checked']) : 0;
    $usuarioID = intval($_SESSION['userId']); // ID do usuário da sessão

    if ($conteudoID > 0 && $usuarioID > 0) {
        if ($checked == 1) {
            // Se o checkbox está marcado, insere ou mantém a entrada
            $query = $banco->prepare("INSERT INTO data_conclusao (conteudoID, usuarioID, dataDeConclusao) 
                                      SELECT ?, ?, NOW() 
                                      WHERE NOT EXISTS (SELECT 1 FROM data_conclusao WHERE conteudoID = ? AND usuarioID = ?)");
            if ($query === false) {
                error_log('Erro na preparação da consulta: ' . $banco->error);
            } else {
                $query->bind_param('iiii', $conteudoID, $usuarioID, $conteudoID, $usuarioID);
                $result = $query->execute();
                if ($result === false) {
                    error_log('Erro na execução da consulta: ' . $query->error);
                }
            }
        } else {
            // Se o checkbox está desmarcado, remove a entrada
            $query = $banco->prepare("DELETE FROM data_conclusao WHERE conteudoID = ? AND usuarioID = ?");
            if ($query === false) {
                error_log('Erro na preparação da consulta: ' . $banco->error);
            } else {
                $query->bind_param('ii', $conteudoID, $usuarioID);
                $result = $query->execute();
                if ($result === false) {
                    error_log('Erro na execução da consulta: ' . $query->error);
                }
            }
        }
    } else {
        error_log('Dados inválidos recebidos: conteudoID=' . $conteudoID . ', checked=' . $checked . ', usuarioID=' . $usuarioID);
    }
}