<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
	{
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'supprimerUnProduit':
	{
		$idProduit = $_REQUEST['produit'];
		retirerDuPanier($idProduit);
		header('location: /jardiplants/index.php?uc=gererPanier&action=voirPanier');
	}
	case 'passerCommande' :
	    $n= nbProduitsDuPanier();
		if($n>0)
		{
			$nom ='';$rue='';$ville ='';$cp='';$mail='';
			include ("vues/v_commande.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	case 'confirmerCommande'	:
	{

		// RECUPERATION DES DONNEES

		$nom = $_REQUEST['nom'];
		$rue = $_REQUEST['rue'];
		$ville = $_REQUEST['ville'];
		$cp = $_REQUEST['cp'];
		$mail = $_REQUEST['mail'];
		$validation = true;
		//TEST POUR VOIR SI TOUS LES CHAMPS SONT RENSEIGNES

		$lesErreurs = getErreursSaisieCommande($nom,$rue,$ville,$cp,$mail);

		if(!empty($lesErreurs))
		{
			//SI LES CHAMPS SONT PAS RENSEIGNES AFFICHE LES CHAMPS VIDE
			echo $lesErreurs;
			//BOOLEAN POUR TESTER LA GLOBALITE DES TESTS
			$validation=false;
		}
		else
		{
			//TEST DE CERTAINS CHAMPS RENSEIGNES POUR VERIFIER QU'ILS SONT BIEN COMPLETES

			$testEntier = estEntier($cp); 
			$testCP = estUnCp($cp);
			$testMail = estUnMail($mail);

			if($testEntier==false){
				//SI ERREUR ET MAL COMPLETE
				echo $testEntier;
				$validation=false;
			}

			if($testCP==false){
				//SI ERREUR ET MAL COMPLETE
				echo $testCP;
				$validation=false;
			}

			if($testMail!=1){
				//SI ERREUR ET MAL COMPLETE
				echo $testMail;
				$validation=false;
			}
		}


		if($validation==true)
		{
			$lesIdProduit = getLesIdProduitsDuPanier();
			$pdo->creerCommande($nom,$rue,$cp,$ville,$mail, $lesIdProduit);
			supprimerPanier();
			header('location: /jardiplants/index.php?uc=accueil');
		}
	}
}


?>


