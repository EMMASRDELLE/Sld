<?php

function debug ($var, $mode = 1) {
	echo '<div style="background: orange; padding: 5px;">';
		if ($mode == 1) {
			echo '<pre>'; print_r($var); echo '</pre>';
		} else {
			echo '<pre>'; var_dump($var); echo '</pre>';
		}
	echo '</div>';
}

// -------------------------------------------------------(isConnect)
function isPatient() {
	if (empty($_SESSION['patient']['statut'] == 0)) {
		return true;
	} else {
		return false;
	}
}

// ---------------------------------------------------------(isAdmin)
function isAdmin() {
	if (empty($_SESSION['admin'] && $_SESSION['admin']['statut'] == 1)) {  // statut 1 correspond à un admin
		return true;
	} else {
		return false;
	}
}

// -----------------------------------------------------------
// -------------------------------------------------------(isConnect)
function isMedecin() {
	if (empty($_SESSION['medecin'] && $_SESSION['medecin']['statut'] == 2)) {
		return true;
	} else {
		return false;
	}
}

// -------------------------------------------------------(isConnect)
function isHopital() {
	if (empty($_SESSION['hopital'] && $_SESSION['hopital']['statut'] == 3)) {
		return true;
	} else {
		return false;
	}
}

// -------------------------------------------------------(isConnect)
function isRadio() {
	if (empty($_SESSION['radio'] && $_SESSION['radio']['statut'] == 4)) {
		return true;
	} else {
		return false;
	}
}

// -------------------------------------------------------(isConnect)
function isLabo() {
	if (empty($_SESSION['labo'] && $_SESSION['labo']['statut'] == 5)) {
		return true;
	} else {
		return false;
	}
}

// -------------------------------------------------------(isConnect)
function isDispensaire() {
	if (empty($_SESSION['dispensaire'] && $_SESSION['dispensaire']['statut'] == 6)) {
		return true;
	} else {
		return false;
	}
}

// -------------------------------------------------------(isConnect)
function isClinique() {
	if (empty($_SESSION['clinique'] && $_SESSION['clinique']['statut'] == 7)) {
		return true;
	} else {
		return false;
	}
}
// 
//creation d'un panier si existe pas
function creationDuPanier() {
	if (!isset($_SESSION['panier'])) {  // si le panier n'existe pas dans la session, on le crée
		$_SESSION['panier'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['id_produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();

	}
}

//----------------------------------------------------------------
function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix) {  // réception des arguments en provenance de panier.php
	creationDuPanier(); // la premiere fois, le panier est créé on peut donc le remplir (= remplir $_SESSION['panier']) :

	// on vérifie que l'article ajouté est déjà dans le panier :
	$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);  // array_search() permet de rechercher la position de $id_produit dans l'array $_SESSION['panier']['id_produit']. il retourne l'indice du produit s'il existe, sinon false.

	if ($position_produit !== false) {
		//le produit est dejà présent dans le panier  :
		$_SESSION['panier']['quantite'][$position_produit] += $quantite; //  on ajoute alors uniquement la nouvelle quantité à la quantité précédemment inscrite dans le panier

	} else {
		// le produit n'est pas encore dans le panier, on l'y ajoute donc :
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_produit'][] = $id_produit;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;

	}

}

//-------------------------------------------------------
function montantTotal() {
	$total = 0;

	for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) {
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i]; // on multiplie quantité par prix que l'ajoute à la valeur précédente de $total (+=)
	}
	return $total;  // renvoie le total à l'endroit où la fonction est appellée
}

//--------------------------------------------------------
function retirerProduitDuPanier($id_produit_a_supprimer) {
	$position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);

	if ($position_produit !== false) {  // l'article est bien dans le panier
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);  // array_splice() coupe l'array indiqué à partir de la position $position_produit et sur 1 indice
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);

	}
}

//----------------------------------------------------------------
function quantiteProduit () {
	if (isset($_SESSION['panier']['quantite']))  {
		return array_sum($_SESSION['panier']['quantite']);  // fait la somme des valeurs des indices "quantite" de la session panier
	} else {
		return 0;  // quand il n'y a pas de produit dans le panier
	}
}

// ----------------------------------------------------------------
function executeRequete($req)
{
	global $mysqli; // permet d'avoir la variable dans l'environnement local de la fonction.
	$resultat = $mysqli->query($req); // on exécute la requete reçue en argument.
	if(!$resultat)// équivalent à if($resultat == FALSE) // si c'est le cas alors il y a une erreur de requete.
	{
		die ("Erreur sur la requete SQL<br />Message: ".$mysqli->error . '<br />Code: '.$req); // s'il y a eu une erreur sur la requete, on affiche tout.
	}
	return $resultat; // on retourne l'objet issu de la classe Mysqli_result qui contient le resultat de la requete.
}

// ------------------------------------------------------------------
function verificationExtensionPhoto()
{
	$extension = strrchr($_FILES['photo']['name'], '.'); // permet de retourner le texte contenu après le . (fourni en 2eme argument) en partant de la fin. Si le nom du fichier est pantalon.jpg => on récupère .jpg
	$extension = strtolower(substr($extension, 1)); // nous coupons le point avec substr et strtolower transforme d'éventuelles majuscule en minuscule.
	$tab_extension_valide = array("gif", "jpg", "jpeg", "png"); // on déclare un tableau array contenant les extension que nous autorisons.
	$verif_extension = in_array($extension, $tab_extension_valide); // in_array vérifi si la valeur du premier argument correspond à une des valeurs du tableau ARRAY. si c'est le cas $verif_extension contiendra TRUE sinon FALSE
	return $verif_extension; // on retourne le résultat qui sera soit TRUE soit FALSE !
}

//Nous créons ici une fonction qui nous permettra d'obtenir des informations propres à un article
function informationSurUneSalle($id)
{
  $resultat = executeRequete("SELECT * FROM salle WHERE id_salle=$id");//si l'id_salle correspond Ã  l'argument de notre fonction
  return $resultat;
}

// ---------------------------------------------------------------------
