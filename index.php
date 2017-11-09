<?php
session_start();
require_once("util/fonctions.inc.php");
require_once("util/class.PdoLBC.inc.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoLBC::getPdoLBC();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'voirFiche' :
		{include("controleurs/c_FicheEvaluation.php");break;}
	case 'statsEquipes' :
		{include("controleurs/c_StatsEquipes.php");break;}
	case 'gestionCarrieres' :
		{include("controleurs/c_GestionCarrieres.php");break;}
}
?>

