<?php
/////////////////////////////////////OBTENIR LES PRODUITs DE L'UTILISATEUR EN UTILISANT SON TOKEN/////////////////////////////////////

require_once '../database/connexion.php';
require_once '../jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
// Declarer la variable token qui vas recuperer le taken
$bearer_token = get_bearer_token();

#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);

if($is_jwt_valid) {
	$sql = "SELECT * FROM produit ORDER BY id DESC";
	$results = dbQuery($sql);
	
	$rows = array();

	while($row = dbFetchAssoc($results)) {
		$rows[] = $row;
	}

	echo json_encode($rows);
} else {
    
	echo json_encode(array('error' => 'Access refusé'));
}