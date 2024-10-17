<?
@session_start();
// error_reporting(E_ALL || ~E_NOTICE || ~E_WARNING);
// error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors',0);
ini_set('default_charset','utf-8');

include('css/geral.php');


echo $CSS;

if(!isset($_SESSION['RENTACAR']['LOGADO'])){
	unset ($_SESSION['RENTACAR']);
	include 'login.php';
	exit;
}

function conecta(){
    
    include('configs/configs.php');
    
    $DADOS=dadosSGDB();
	
	$MY_CONNECT=mysqli_connect($DADOS['HOST'],$DADOS['ZE_MANE'],$DADOS['XFILEX'],$DADOS['DBNAME'], $DADOS['PORT']) or die("<br><br><br>*** ERRO DE CONEXÃO COM O S.G.D.B. MySQL ***<br><br><br>");
	$MY_DATABASE=mysqli_select_db($MY_CONNECT,$DBNAME);
	return $MY_CONNECT;
}

function desconecta($MY_CONNECT){
	mysqli_close($MY_CONNECT);
}

function sqlexe($link,$sql){
	$R=mysqli_query($link,$sql);
	while($d=mysqli_fetch_assoc($R)){
		$dados[]=$d;
	}
	return $dados;
}

function sqlupd($link,$sql){
	if($R=mysqli_query($link,$sql)){
		return true;
	}else{
		die(mysqli_error($link));
	}
}

function br2bd($date)
{
	list($dia, $mes, $ano)=explode("/", $date);
	return sprintf("%04d",$ano)."-".sprintf("%02d",$mes)."-".sprintf("%02d",$dia);
}

function bd2br($date)
{
	if ($date=="0000-00-00") return "";
	else
	{
		$date=date("d/m/Y", strtotime($date));
		//list($dia,$mes,$ano) = explode("/",$date);
		//$date = sprintf("%02d/%02d/%04d",$dia,$mes,$ano);
		return $date;
	}
}

function mes_ext($mes)
{
	$meses=array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
	return $meses[$mes-1];
}

function combo_meses($mes=null){
	$mes=$mes*1;
	$combo=null;
	$meses=array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
	foreach ($meses as $C => $V)
	{
		if($mes!=null and $mes>=1 and $mes<=12 and $mes==($C+1)){
			$checked=' selected ';
		}else{
			$checked='';
		}
		$combo.='<option value="'.($C+1).'" '.$checked.'>'.$V.'</option>
';
	}
	unset($C,$V);
	return $combo;
}
?>