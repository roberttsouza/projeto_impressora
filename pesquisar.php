<?php

include_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="formata.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
     <script src="script.js"></script>
    <title>Pesquisar</title>
</head>
<body>

<nav>

    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="indexCadastro.php">cadastrar</a></li>
        <li><a class="logo" href="index.html">LOGO</a></li>
        <li><a href="listar_reg_impressora.php">Registro</a></li>
        <li><a href="pesquisar.php">Pesquisar</a></li>
        
    </ul>
</nav>
    <a class="logo1" href="index.html">LOGO</a>
<!---------------------------------botão de navegação rapida ------------------------->

    <div id="mainbox" onclick="openFunction()">&#9776;</div>
    <div id="menu" class="sidemenu">
    <a href="listar_reg_impressora.php">lista de impressoras</a>
    <a href="listar_reg_impressora.php">Gerar planilha Excel</a>
    <a href="indexCadastro.php">cadastrar impressora</a>
    <a href="pesquisar.php">Pesquisar</a>
    <a href="#" class="closebtn" onclick="closefuction()">&times;</a>
</div>

    
    <!---------------------------------formulario de cadastramento de impressoras------------------------>

<div class="btnRelatorio">

    <a href="indexCadastro.php"><button type="button" id="btn-sm">Cadastrar</button></a>
    <a href="gerar_pla_excel.php"><button type="button" id="btn-sm">Gerar Excel</button></a>

</div>


<div id="formCadh">
<h2>Pesquisar</h2>
</div>


    <?php if (isset($_SESSION['msg'])) { ?>
        <script>alert('<?= $_SESSION['msg'] ?>');</script>
    <?php } ?>

  


    <form id="formCad" method="POST" action="">

       

        <label>Pesquisar por IP:</label>
        <input name="ip" class="campo" type="text" id="ip">
        
        <br>
        

        <input name="sendPesquisar" type="submit" class="btn" id="btnS" value="Pesquisar">
        <input type="reset" class="btn" id="btnL" value="limpar">
      </form>

      <?php


    $sendPesquisar =  filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING);
        if($sendPesquisar){
            $ip = filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING);
       

            $resulPesquisar = "SELECT * FROM reg_impressora WHERE ip LIKE '%$ip%'";
            $resultadopesquisar = mysqli_query($conn, $resulPesquisar);
            while($row_pesquisar = mysqli_fetch_assoc($resultadopesquisar)){
                echo "<br><br><br><br>";
                
                echo "<article>";
                
                echo "<h4>IP: " .$row_pesquisar['ip']."</h4><hr>";
                echo "<h4>Serie: " .$row_pesquisar['serie']."</h4><hr>";
                echo "<h4>Grade comando: " .$row_pesquisar['igdep']."</h4><hr>";
                echo "<h4>Batalhao: " .$row_pesquisar['batalhao']."</h4><hr>";
                echo "<h4>Companhia: " .$row_pesquisar['companhia']."</h4><hr>";
                echo "<h4>Tipo: " .$row_pesquisar['tipo']."</h4><hr>";
                echo "<h4>Municipio: " .$row_pesquisar['municipio']."</h4><hr>";
                echo "<h4>Log: " .$row_pesquisar['logR']."</h4><br><hr>";
                echo "<h4>CEP: " .$row_pesquisar['cep']."</h4><hr>";
                echo "<h4>Rua: " .$row_pesquisar['rua']."</h4><hr>";
                echo "<h4>Bairro: " .$row_pesquisar['bairro']."</h4><hr>";
                echo "<h4>Cidade: " .$row_pesquisar['cidade']."</h4><hr>";
                echo "<h4>Uf: " .$row_pesquisar['uf']."</h4><hr>";
                echo "<h4>Complemento: " .$row_pesquisar['complemento']."</h4><hr>";
                echo "<h4>Ultima atualização: " .$row_pesquisar['data']."</h4><br><br>";
                echo "<a href='edita_reg_impressora.php?id=" .$row_pesquisar['id']."'>Editar</a><br>";
                echo "<a href='proc_apagar_imp.php?id=" .$row_pesquisar['id']."'>Apagar</a><br><br>";
        
                
                
                echo "</article>";
            }

}
    

      ?>
      
        
</body>
</html>