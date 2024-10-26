<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<?php
      function voltar(){
        return "<a href='index.php'><span class='material-icons'></span></a>";
      }

      function msg_sucesso($m){
        $resp = "<div class='sucesso'><i class='bx bx-check'></i>$m</div>";
        return $resp;
      }

      function msg_aviso($m){
        $resp = "<div class='aviso'><i class='bx bx-info-circle'></i>$m</div>";
        return $resp;
      }

      function msg_erro($m){
        $resp = "<div class='erro'><i class='bx bx-error'></i>$m</div>";
        return $resp;
      }
    
?>