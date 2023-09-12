<?php
$id = (int) $_GET['id'] ?? '';

if (empty($id)) {
	header('Location: \lucas-siscrud2/index.php?page=lista_usu&msg=8');
} else {
	$sql = "UPDATE usuario SET ativo = '0' WHERE id =".'$id'.";";
	$comando = $conexao -> prepare($sql);
	try {
		$conexao -> beginTransaction();
		$comando -> execute();
		$conexao -> commit();
		$total_block = $comando -> rowCount();
		if($total_block >= 0) {
			header('Location: \siscrud2/index.php?page=lista_usu&msg=5');
		} else {
			header('Location: \siscrud2/index.php?page=lista_usu&msg=6');
		}
	} catch (Exception $e) {
		$conexao -> rollback();
		throw $e;
	}
}
?>