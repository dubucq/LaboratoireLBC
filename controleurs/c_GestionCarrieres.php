<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'gestionCarrieres':
	{
		include("vues/v_GestionSuiviCarriere.php");
  		break;
	}
}
?>