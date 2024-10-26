<?php
session_start();
require_once "barra.php";

if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendações</title>
    <link rel="stylesheet" href="styles/recomendacoes.css">
    <link rel class="stylesheet" href="styles/barraDeNavegacao.css">
</head>
<body>
<div class="content">
<div class="container">
<div class="card">
    <h2 class="card-title">Daniel Ferretto</h2>
    <h3 class="card-subtitle">Matéria: Matemática</h3>
    <img src="imagens/professorFerreto.jpg" alt="Daniel Ferretto">
    <p class="card-description">Daniel Ferretto é conhecido pelas suas aulas didáticas de matemática para vestibulares e concursos.</p>
    <a href="https://www.youtube.com/@professorferretto" class="card-button" target="_blank">Saiba Mais</a>
</div>

<div class="card">
    <h2 class="card-title">Marcelo Boaro</h2>
    <h3 class="card-subtitle">Matéria: Física</h3>
    <img src="imagens/professorMarcelo.jpg" alt="Professor Marcelo Boaro">
    <p class="card-description">Professor Marcelo Boaro é conhecido por suas aulas de Física focadas em didática e resolução de problemas.</p>
    <a href="https://www.youtube.com/@professorboaro" class="card-button"target="_blank">Saiba Mais</a>
</div>

<div class="card">
    <h2 class="card-title">Paulo Valim</h2>
    <h3 class="card-subtitle">Matéria: Química</h3>
    <img src="imagens/professorPaulo.jpg" alt="Professor Paulo Valim">
    <p class="card-description">Aulas de Química com uma abordagem clara e didática, ideal para estudantes de vestibulares e ENEM.</p>
    <a href="https://www.youtube.com/@paulovalim" class="card-button"target="_blank">Saiba Mais</a>
</div>

<div class="card">
    <h2 class="card-title">Pedro Rennó</h2>
    <h3 class="card-subtitle">Matéria: História</h3>
    <img src="imagens/professorPedro.jpg" alt="Professor Pedro Rennó">
    <p class="card-description">Videoaulas de História voltadas para vestibulares, com abordagens dinâmicas e conteúdo atualizado.</p>
    <a href="https://www.youtube.com/@Parab%C3%B3lica" class="card-button"target="_blank">Saiba Mais</a>
</div>



<div class="card">
    <h2 class="card-title">Groth</h2>
    <h3 class="card-subtitle">Matéria: Geografia</h3>
    <img src="imagens/professorGroth.jpg" alt="Professor Groth">
    <p class="card-description">Conhecido por suas videoaulas de Geografia no time Ferreto, focadas em preparação para vestibulares.</p>
    <a href="https://www.youtube.com/@professorferretto" class="card-button"target="_blank">Saiba Mais</a>
</div>


<div class="card">
    <h2 class="card-title">Jubilut</h2>
    <h3 class="card-subtitle">Matéria: Biologia</h3>
    <img src="imagens/professorJubilut.png" alt="Professor Jubilut">
    <p class="card-description">O canal Biologia Total oferece aulas de biologia didáticas, cobrindo temas de vestibulares de maneira divertida.</p>
    <a href="https://www.youtube.com/@paulojubilut" class="card-button"target="_blank">Saiba Mais</a>
</div>

<div class="card">
    <h2 class="card-title">Noslen</h2>
    <h3 class="card-subtitle">Matéria: Português</h3>
    <img src="imagens/professorNoslen.jpg"alt="Noslen">
    <p class="card-description">Videoaulas de Português, focadas no ENEM e vestibulares, dinâmicas, leves, inovadoras e divertidas.</p>
    <a href="https://www.youtube.com/@ProfessorNoslen" class="card-button"target="_blank">Saiba Mais</a>
</div>


<div class="card">
    <h2 class="card-title">Alencar</h2>
    <h3 class="card-subtitle">Matéria: Literatura</h3>
    <img src="imagens/professorAlencar.jpg" alt="Alencar">
    <p class="card-description">Literatura, com foco em vestibulares e ENEM, abordando obras e autores de forma clara e didática.</p>
    <a href="https://www.youtube.com/@LiteraturacomAlencar" class="card-button"target="_blank">Saiba Mais</a>
</div>


<div class="card">
<h2 class="card-title">Giovanna L. de Lima</h2>
    <h3 class="card-subtitle">Matéria: Línguas Estrangeiras</h3>
    <img src="imagens/professoraGiovanna.jpg" alt="Giovanna L. de Lima">
    <p class="card-description">Videoaulas de Inglês, focadas em vestibulares e ENEM, oferecendo uma abordagem didática e prática.</p>
    <a href="https://www.youtube.com/@giovannalordeiro" class="card-button"target="_blank">Saiba Mais</a>
</div>
</div>
</div>
</body>
</html>