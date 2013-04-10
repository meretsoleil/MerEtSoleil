<?php 

$db_host = "localhost";
$db_user = "root";
$db_password ="root";
$db_bdd = "mer_et_soleil";

$con = mysql_connect($db_host,$db_user,$db_password) or die ("ERREUR connection a mysql");  
mysql_select_db($db_bdd,$con) or die ("ERREUR connection a la base");

?>