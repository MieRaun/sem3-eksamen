<?php 
session_start();
// forbindelse til mySQL server med mysqli metoden
// 1. Konstanter til forbindelsesdata TIL localhost
const HOSTNAME = 'raungraphics.com.mysql'; // servernavn
const MYSQLUSER ='raungraphics_com_horzehillerod'; // super bruger (remote har man særskilte database brugere)
const MYSQLPASS = '3200mieraun'; // bruger password
const MYSQLDB = 'raungraphics.com.mysql'; // database navn
// 2. Oprette forbindelsen via mysqli objekt $con
$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
// definere et character-set (utf 8) for forbindelsen
$con->set_charset('utf8');
// 3. Forbindelses-tjek
// hvis forbindelsen ikke lykkedes
if($con->connect_error){
	die($con->connect_error);
}
?>
