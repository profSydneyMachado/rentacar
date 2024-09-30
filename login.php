<?php
// $_POST=anti_injection($_POST);
// $_GET=anti_injection($_GET);

if($_POST['botao']=='.::Login::.'){
	$sql='select * from usuarios where us_login="'.$_POST['usuario'].'" and us_senha="'.md5(md5(md5($_POST['senha']))).'"';
	$link=conecta();
	$r=mysqli_query($link,$sql);
	desconecta($link);
	if(mysqli_num_rows($r)==1){
		$dados=mysqli_fetch_assoc($r);
		@session_start();
		$_SESSION['ACOESAEREAS']['LOGADO']=$dados['us_login'];
		header('Location: index.php');
	}else{
		unset ($_SESSION['ACOESAEREAS']);
		header('Location: index.php');
		exit;
	}
}

if($_POST['botao']==''){
	?>
	<div align=center>
		<form method='POST' action=''>
			<table border='1'>
				<th colspan=2>Exams!</th>
				<tr><td>Login: </td><td><input type='text' size='20' name='usuario' /></td></tr>
				<tr><td>Senha: </td><td><input type='password' size='20' name='senha' /></td></tr>
				<tr><td colspan='2'><center><input name='botao' type='submit' value='.::Login::.' /></center></td></tr>
			</table>
		</form>
	</div>
	<?
	exit;
}else{
	header('Location: index.php');
}
