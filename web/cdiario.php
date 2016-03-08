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
<body style="background-color:#FFFFFF;">
<?
$adminPass = 1;
$token=$_GET['token'];
$diano=$_GET['diano'];

$flag=$_GET['flag'];
$admin = $_GET['admin'];
$fecha = $_GET['fecha'];
if(isset($fecha))
{
	$dia = (date('z Y', strtotime($fecha)))+1;		
	$diano =$dia;	
}




						$dbhost="localhost";  // host del MySQL (generalmente localhost)
	  					$dbusuario="root"; // aqui debes ingresar el nombre de usuario para acceder a la base
	  					$dbpassword="ml350"; // password de acceso para el usuario de la linea anterior
	 					$db="aproa";        // Seleccionamos la base con la cual trabajar	
	 					$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
	  					mysql_select_db($db, $conexion);
						
$sqltoken=mysql_query("SELECT * FROM token WHERE token='$token'", $conexion);
$dotoken=mysql_fetch_array ($sqltoken);
$tokenaccesos=$dotoken[2];




?>

<head>
	<title>Gestion de crisis APROA - Correo diario <? $fechastra=date("d-m-Y"); echo"$fechastra"; ?> </title>
</head>

<form action="cdiario.php">
  Buscar por fecha (DD-MM-AAAA):  
  <input type="text" name="fecha" value="" method="get">
  <?if($admin==1):?>
  <input type="hidden" name="admin" value="<?=$admin?>" method="get" >
  <?endif ?>
  <input type="submit" value="Submit">
</form>
<?

$adminParam = $admin == $adminPass? "&admin=".$dminPass."1":"";
echo"
				<hr>
				<table border=0 width=100%>
				<tr>
				<td align='left'><a href='cdiario.php?diano=".($diano-1)."&token=$token&flag=1".$adminParam."'>Día anterior</a></td>					
				<td align='right'><a href='cdiario.php?diano=".($diano+1)."&token=$token&flag=1".$adminParam."'>Día siguiente</a></td>
				</tr>
				</table>
				<hr>
				<center>
				<a href='http://www.aproa.eu/crisis'>::.. Volver a la Web de Aproa</a>
				</center>
				";
if(file_exists('img/'.$diano.'1.jpg') && file_exists('img/'.$diano.'2.jpg') && file_exists('img/'.$diano.'3.jpg')){

	if($tokenaccesos>0 || $admin==$adminPass){
		
			
	
		echo"<center>";
			echo"<img src='img/cabecera.jpg' width=90% />";
		echo"</center>";
	

		
		if($flag!=1){
			$tokenaccesos=$tokenaccesos-1;
			$sqlupdatetoken=mysql_query("UPDATE token SET accesos=$tokenaccesos WHERE token='$token'", $conexion);
			mysql_query("INSERT INTO accesos (usuario,fecha,ip) VALUES ('$token',NOW(),'".$_SERVER['REMOTE_ADDR']."')",$conexion);
		}
	
		if(!isset($diano)){
			echo"<center>";
			echo"<img src='img/".$diano."1.jpg' width=90% />";
			echo"</center>";
			echo"<center>";
			echo"<img src='img/".$diano."2.jpg' width=90% />";
			echo"</center>";
			echo"<center>";
			echo"<img src='img/".$diano."3.jpg' width=90% />";
			echo"</center>";
			
			if(file_exists('img/'.$diano.'4.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."4.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'5.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."5.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'6.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."6.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'7.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."7.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'8.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."8.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'9.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."9.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'10.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."10.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'11.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."11.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'12.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."12.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'13.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."13.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'14.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."14.jpg' width=90% />";
				echo"</center>";
			}
			echo"
				<hr>
				<table border=0 width=100%>
				<tr>
				<td align='left'><a href='cdiario.php?diano=$dianterior&token=$token&fechamodi=$fechaayer'&flag=1>Día anterior</a></td>
					<td align='center'><a href='cdiario.php?diano=$diano2&token=$token&flag=1'>Día actual</a></td>
				<td align='right'><a href='cdiario.php?diano=$diaposterior&token=$token&fechamodi=$fechatomorrow&flag=1'>Día siguiente</a></td>
				</tr>
				</table>
				<hr>
				<center>
				<a href='http://www.aproa.eu/crisis'>::.. Volver a la Web de Aproa</a>
				</center>
				";
			
		}else{
			echo"<center>";
			echo"<img src='img/".$diano."1.jpg' width=90% />";
			echo"</center>";
			echo"<center>";
			echo"<img src='img/".$diano."2.jpg' width=90% />";
			echo"</center>";
			echo"<center>";
			echo"<img src='img/".$diano."3.jpg' width=90% />";
			echo"</center>";
			
			if(file_exists('img/'.$diano.'4.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."4.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'5.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."5.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'6.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."6.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'7.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."7.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'8.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."8.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'9.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."9.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'10.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."10.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'11.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."11.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'12.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."12.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'13.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."13.jpg' width=90% />";
				echo"</center>";
			}
			if(file_exists('img/'.$diano.'14.jpg')){
				echo"<center>";
				echo"<img src='img/".$diano."14.jpg' width=90% />";
				echo"</center>";
			}
			echo"<center>";
				echo"<img src='img/subvencionado.jpg' width=40% />";
			echo"</center>";
		}
			
	}else{
		echo"Su token de acceso ha expirado o no tiene permiso para acceder a la página solicitada.";
	}
}else{
	echo"No existen datos para el correo diario de hoy $fechamodi";
		
}

?>
</body>
</html>