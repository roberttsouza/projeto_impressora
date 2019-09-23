<?php
session_start();
include_once ('conexao.php');

$id = $_POST['id'];
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


$result_imp = "UPDATE reg_impressora SET ip='$ip', serie='$serie', igdep='$igdep', batalhao='$batalhao', companhia='$companhia', tipo='$tipo', municipio='$municipio', logR='$logR', cep='$cep', rua='$rua', bairro='$bairro', cidade='$cidade', uf='$uf', complemento='$complemento', data = NOW() WHERE id='$id'";

$resultado_imp = mysqli_query($conn, $result_imp);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "Registro editado com sucesso!";
	header("Location: listar_reg_impressora.php");

}else{
	$_SESSION['msg'] = "Registro NÂO editodo";
	header("Location: edita_reg_impressora.php?id= $id");
}