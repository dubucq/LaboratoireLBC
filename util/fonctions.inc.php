<?php
/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
*/
function initPanier()
{
	if(!isset($_SESSION['produits']))
	{
		$_SESSION['produits']= array();
	}
}

?>
