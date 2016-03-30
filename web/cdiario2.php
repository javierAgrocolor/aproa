<html>

<style>
a:link {
	color: #B91128;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #B91128;
}
a:hover {
	text-decoration: underline;
	color: #B91128;
}
a:active {
	text-decoration: none;
	color: #B91128;
}
</style>

<?php
if(isset($_GET['token'])){
$token=$_GET['token'];	
}else{
$token=null;		
}

if(isset($_GET['diano'])){
$diano=$_GET['diano'];
}else{
$diano=null;	
}
	
if(isset($_GET['flag'])){
$flag=$_GET['flag'];
}else{
$flag=null;	
}	

if(isset($_GET['fecha'])){
$fecha=$_GET['fecha'];
}else{
$fecha=null;	
}	
	
if(isset($_GET['admin'])){
$admin=$_GET['admin'];
}else{
$admin=null;
}	

if(isset($fecha))
{
	$dia = (date('z Y', strtotime($fecha)))+1;	
	$anio = date('Y', strtotime($fecha));
	$diano = $anio."-".$dia;	
}
else{
	$fecha = date("d-m-Y", strtotime("01-01-".anio()));
	$fecha = strtotime($fecha." + ".(dia()-1)." days");
}

if(!isset($diano))
{
	exit("Faltan datos para mostrar el contenido.");	
}
//echo "<h3>Bolet�n con fecha: ".strtotime("January 1st +".($dia-1)." days")."</h3>";
function imagen($nombre)
{	
	if(file_exists('./boletines_correos/img2/'.$nombre)){
		echo "<center>";
		echo "<img src='./boletines_correos/img2/".$nombre."' width=90% />";
		echo "</center>";
	}
}

function codanterior()
{	
	return anio().'-'.(dia()-1);
}

function codsiguiente()
{
	return anio().'-'.(dia()+1);	
}

function anio()
{
	global $diano;
	$tok = split('-',$diano);
	$anio = $tok[0];
	return $anio;
}

function dia()
{
	global $diano;
	$tok = split('-',$diano);
	$dia = $tok[1];
	return $dia;
}



$dbhost="192.168.0.3";  // host del MySQL (generalmente localhost)
$dbusuario="root"; // aqui debes ingresar el nombre de usuario para acceder a la base
$dbpassword="ml350"; // password de acceso para el usuario de la linea anterior
$db="aproa";        // Seleccionamos la base con la cual trabajar	
$conexion = mysqli_connect($dbhost, $dbusuario, $dbpassword);
mysqli_select_db($conexion,$db);
						
$sqltoken=mysqli_query($conexion,"SELECT * FROM token WHERE token='$token'");
$dotoken=mysqli_fetch_array ($sqltoken);
$tokenaccesos=$dotoken[2];
$adminParam = $admin == 1? '&admin=1':'';
?>

<head>
	<title>Gestion de crisis APROA - Correo diario <?= date("d-m-Y",$fecha) ?> </title>
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
</head>
<body style="background-color:#FFFFFF;">
<form action="cdiario2.php">
  Buscar por fecha (dd-mm-aaaa):  
  <input type="text" name="fecha" value="" method="get">
  <?if($admin==1):?>
  <input type="hidden" name="admin" value="<?=$admin?>" method="get" >
  <?endif ?>
  <input type="submit" value="Submit">
</form>

<?php

echo"
	<hr>
	<table border=0 width=100%>
	<tr>
	<td align='left'><a href='cdiario2.php?diano=".codanterior()."&token=$token&flag=1".$adminParam."'><img src='/images/anterior.png' class='img-responsive'/></a></td>
	<td align='center'><a href='index.php'>Volver a la Web de Aproa</a></td>
	<td align='right'><a href='cdiario2.php?diano=".codsiguiente()."&token=$token&flag=1".$adminParam."'><img src='/images/siguiente.png' class='img-responsive'/></a></td>
	</tr>
	</table>
	<hr>
	
	";

if(file_exists('./boletines_correos/img2/'.$diano.'-1.jpg') && file_exists('./boletines_correos/img2/'.$diano.'-2.jpg') && file_exists('./boletines_correos/img2/'.$diano.'-3.jpg')){
	if($tokenaccesos>0 || $admin==1){
	
		imagen('cabecera.jpg');

		
		if($flag!=1){
			$tokenaccesos=$tokenaccesos-1;
			$sqlupdatetoken=mysqli_query($conexion,"UPDATE token SET accesos=$tokenaccesos WHERE token='$token'");
			mysqli_query($conexion,"INSERT INTO accesos (usuario,fecha,ip) VALUES ('$token',NOW(),'".$_SERVER['REMOTE_ADDR']."')");
		}
	
		if(isset($diano)){
			
			imagen($diano."-1.jpg");
			imagen($diano."-2.jpg");
			imagen($diano."-3.jpg");
			imagen($diano."-4.jpg");
			imagen($diano."-5.jpg");
			imagen($diano."-6.jpg");
			imagen($diano."-7.jpg");
			imagen($diano."-8.jpg");
			imagen($diano."-9.jpg");
			imagen($diano."-10.jpg");
			imagen($diano."-11.jpg");
			imagen($diano."-12.jpg");
			imagen($diano."-13.jpg");
			imagen($diano."-14.jpg");
							
		}		
	}else{
		echo "<p align='center'>Su token de acceso ha expirado o no tiene permiso para acceder a la p&aacute;gina solicitada.</p>";
	}
}else{
	echo "<p align='center'>No existen datos para el correo diario para la fecha indicada.</p>";			
}
?>
</body>
</html>