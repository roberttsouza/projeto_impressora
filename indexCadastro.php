<?php

session_start();

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
    <title>Cadastro</title>
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
<h2>cadastrar impressora</h2>
</div>


    <?php if (isset($_SESSION['msg'])) { ?>
        <script>alert('<?= $_SESSION['msg'] ?>');</script>
    <?php } ?>

  


    <form id="formCad" method="POST" action="proc_msg.php">

        
        <label>IP:</label>
        <input type="text" class="campo" name="ip" placeholder="Inserir o IP">

        <br>

        <label>N° série:</label>
        <input type="text" class="campo" name="serie" placeholder="Inserir o N° Série">

        <br>

        <label>GDE comando:</label>
        <input type="text" class="campo" name="igdep" placeholder="Inserir o GDE comando">

        <br>

        <label>Batalhão:</label>
        <input type="text" class="campo" name="batalhao" placeholder="Inserir o Batalhão"> 
        
        <br>

        <label>Companhia:</label>
        <input type="text" class="campo" name="companhia" placeholder="Inserir a companhia">

        <br>

        <label>Tipo:</label>
        <input type="text" class="campo" name="tipo" placeholder="Inserir o tipo">
        
        <br>

        <label>Municipio:</label>
        <input type="text" class="campo" name="municipio" placeholder="Inserir o municipio">

        <br>

        <label>Log:</label>
        <textarea   class="campoLog" name="logR" placeholder="Inserir o log"></textarea> 

        <br>

        <label>Cep:</label>
        <input name="cep" class="campo" type="text" id="cep" value=""  maxlength="9"
               onblur="pesquisacep(this.value);">

        <br>

        <label>Rua:</label>
        <input name="rua" class="campo" type="text" id="rua" >

        <br>
        
        <label>Bairro:</label>
        <input name="bairro" class="campo" type="text" id="bairro">
        
        <br>

        <label>Cidade:</label>
        <input name="cidade" class="campo" type="text" id="cidade">
        
        <br>

        <label>Estado:</label>
        <input name="uf" class="campo" type="text" id="uf">
        
        <br>
        
        <label>complemento:</label>
        <input name="complemento" class="campo" type="text" id="complemento">

        <br>

        <input type="submit" class="btn" id="btnS" value="registrar">
        <input type="reset" class="btn" id="btnL" value="limpar">
      </form>


      <script src="scriptCep.js"></script>

    
        
</body>
</html>