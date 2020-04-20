<?php
include('database.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//	$server="localhost:3306";
//	$username="vfmappl_vfmappl";
//	$password="vfm@123";
//	$sqlconnect=mysql_connect($server, $username, $password);
//	$sqldb=mysql_select_db("vfmappl_vfm_foshwadb",$sqlconnect);
	
//	if(!$sqlconnect){
//		echo "NO";
//		}else{
//	ECHO "yes";}

$arrtypedet = $database->query("SELECT id,name FROM categories ORDER BY name");

 while ($typ = $database->fetch_set($arrtypedet)) 
{
   

    echo $typ['name']."<br>";
}

?>