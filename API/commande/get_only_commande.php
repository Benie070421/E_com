<?php
/////////////////////////////////////OBTENIR LES COMMANDE DE L'UTILISATEUR EN FONCTION DE SON TOKEN/////////////////////////////////////
require_once '../database/connexion.php';
require_once '../jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
// Declarer la variable token qui vas recuperer le taken
$bearer_token = get_bearer_token();

#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);

if($is_jwt_valid) {
	////selectionner tout les user dont le token est egale au token ajouter
	$sql = "SELECT * FROM user WHERE token = '$bearer_token'";
	$result = dbQuery($sql);

	/// stocker le resultat dans row 
	$row = dbFetchAssoc($result);
	/// obtenir l'id de l'utilisateur et le stocker dans la variable id_user
	$id_user = $row['id'];
    
	//selectionner le produit dont le vendeur est egale au user possedant le token au dessus
	$sql = "SELECT * FROM commande LEFT JOIN produit ON produit.id= commande.produit WHERE client = '$id_user' ";
	$results = dbQuery($sql);
	$rows = array();

	// $row2 = dbFetchAssoc($results);
	// $idproduit = $row2['produit'];
	// $sql = "SELECT * FROM produit WHERE id = '$idproduit' ";
	// $resulta = dbQuery($sql);
	// $rows2 = array();
	while($row = dbFetchAssoc($results) ) {
		$rows[] = $row;
		// $rows2[] = $row2;
	}
	// echo json_encode($rows2);
	echo json_encode($rows);
	
} else {
    
	echo json_encode(array('error' => 'Access refusé'));
}