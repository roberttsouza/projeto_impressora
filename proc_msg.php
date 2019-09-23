<?php
session_start();
include_once ('conexao.php');

$ip = $_POST['ip'];
$serie = $_POST['serie'];
$igdep = $_POST['igdep'];
$batalhao = $_POST['batalhao'];
$companhia = $_POST['companhia'];
$tipo = $_POST['tipo'];
$municipio = $_POST['municipio'];
$logR = $_POST['logR'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$complemento = $_POST['complemento'];



$sql = "INSERT INTO reg_impressora (ip, serie, igdep, batalhao, companhia, tipo, municipio, logR, cep, rua, bairro, cidade, uf, complemento, data) VALUES ('$ip', '$serie', '$igdep', '$batalhao', '$companhia', '$tipo', '$municipio', '$logR', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$complemento', NOW())";

$salvar = mysqli_query($conn, $sql);

if(mysqli_insert_id($conn)){

	$_SESSION['msg'] = "Registro efetuado com sucesso!";
	header("Location: indexCadastro.php");
}else{
	$_SESSION['msg'] = "Registro NÂO efetuado";
	header("Location: indexCadastro.php");
}