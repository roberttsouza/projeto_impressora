<?php

session_start();
include_once('conexao.php');

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
    <title>Lista registros</title>
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

<div id="formCadh">
<h2>Lista de impressoras</h2>
</div><br><br><br><br>




<?php if (isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
    
    
//receber o numero da pagina atual 
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
    
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //setar a quantidade de itens na pagina 
$quantidade_result_pg = 5;

//calcular a quantidade que vai ostrar no inicio da pagina 

$inicio = ($quantidade_result_pg * $pagina) - $quantidade_result_pg;

    $result_reg_imp = "SELECT * FROM reg_impressora LIMIT $inicio, $quantidade_result_pg";
    $result_reg_impressora = mysqli_query($conn,$result_reg_imp);
    while($row_reg_imp = mysqli_fetch_assoc($result_reg_impressora)){
      
        echo "<article>";
      
        echo "<h4>IP: " .$row_reg_imp['ip']."</h4><hr>";
        echo "<h4>Serie: " .$row_reg_imp['serie']."</h4><hr>";
        echo "<h4>Grade comando: " .$row_reg_imp['igdep']."</h4><hr>";
        echo "<h4>Batalhão: " .$row_reg_imp['batalhao']."</h4><hr>";
        echo "<h4>Companhia: " .$row_reg_imp['companhia']."</h4><hr>";
        echo "<h4>Tipo: " .$row_reg_imp['tipo']."</h4><hr>";
        echo "<h4>Municipio: " .$row_reg_imp['municipio']."</h4><hr>";
        echo "<h4>Log: " .$row_reg_imp['logR']."</h4><br><hr>";
        echo "<h4>CEP: " .$row_reg_imp['cep']."</h4><hr>";
        echo "<h4>Rua: " .$row_reg_imp['rua']."</h4><hr>";
        echo "<h4>Bairro: " .$row_reg_imp['bairro']."</h4><hr>";
        echo "<h4>Cidade: " .$row_reg_imp['cidade']."</h4><hr>";
        echo "<h4>Uf: " .$row_reg_imp['uf']."</h4><hr>";
        echo "<h4>Complemento: " .$row_reg_imp['complemento']."</h4><hr>";
        echo "<h4>Ultima atualização: " .$row_reg_imp['data']."</h4><br><br>";
        echo "<a href='edita_reg_impressora.php?id=" .$row_reg_imp['id']."'>Editar</a><br>";
        echo "<a href='proc_apagar_imp.php?id=" .$row_reg_imp['id']."'>Apagar</a><br><br>";

        
        
        echo "</article>";
    }


    $result_pg = "SELECT COUNT(id) AS num_result FROM reg_impressora";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    $quantidade_pg = ceil ($row_pg['num_result'] / $quantidade_result_pg);

    echo "<div style='text-align: center; background: #fff;  font-size: 25px; '>";

    $max_links = 2;
    echo  "<a style=' text-decoration: none; ' href='listar_reg_impressora.php?pagina=1'><< </a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
        
        if($pag_ant >= 1){
        echo  "<a style=' text-decoration: none; ' href='listar_reg_impressora.php?pagina=$pag_ant'>$pag_ant  </a>";
        }
    }

    echo  "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
        if($pag_dep <= $quantidade_pg){
            echo  "<a style=' text-decoration: none;' href='listar_reg_impressora.php?pagina=$pag_dep'>$pag_dep   </a>";
        }
    }

    echo  "<a style=' text-decoration: none;' href='listar_reg_impressora.php?$quantidade_pg'> >></a>";

    echo "</div>";

    ?>


    
        
</body>
</html>