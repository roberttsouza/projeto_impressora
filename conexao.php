<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "site_impressora";

$conn = mysqli_connect($hostname,$user,$password,$database);

if (!$conn) {
	print"falha na conexão com o banco de dados";
}


?>