<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'statsEquipes':
	{
		include("vues/v_StatistiquesEquipes.php");
  		break;
	}
}
?>