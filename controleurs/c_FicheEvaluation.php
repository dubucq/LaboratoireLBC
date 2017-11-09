<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'ficheAccompagnement':
	{
		include("vues/v_FicheEvaluationAccompagnement.php");
  		break;
	}
	case 'ficheAnnuel' :
	{
		include("vues/v_FicheEvaluationAnnuel.php");
		break;
	}
}
?>

