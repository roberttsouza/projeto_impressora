<?php
session_start();
include_once ('conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


if(!empty($id)){

	$result_apagar_reg = "DELETE FROM reg_impressora WHERE ID = '$id'";
	$resultado_apagar_reg = mysqli_query($conn, $result_apagar_reg);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "Registro APAGADO com sucesso!";
		header("Location: listar_reg_impressora.php");

	}else{
		$_SESSION['msg'] = "Registro NÂO apagado";
		header("Location: listar_reg_impressora.php");
	}

}else{
	$_SESSION['msg'] = "Necessário selecionar um usuário";
	header("Location: listar_reg_impressora.php");
}

