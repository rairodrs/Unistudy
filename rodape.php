<style>
    footer{
        position:end;
    }
    h3{
    color:#606060;
    font-size: 50px;
}
</style>
<footer>
<h3>
        <?php
         $q="SELECT FORMAT(AVG(nota), 2) AS media FROM avaliacoes";
         $busca = $banco->query($q);

        if ($busca) {
         $reg = $busca->fetch_object();
         if ($reg) {
         echo $reg->media;
        } else {
        echo "Nenhuma avaliação encontrada.";
        }
        } else {
           echo "Erro na consulta: " . $banco->error;
        }
        ?><i class="bx bxs-star icon" style="font-size: 30px;"></i>
</h3>
</footer>