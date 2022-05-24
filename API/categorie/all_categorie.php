<?php
/////////////////////////////////////OBTENIR LES PRODUITs DE L'UTILISATEUR EN UTILISANT SON TOKEN/////////////////////////////////////

require_once '../database/connexion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$sql = "SELECT * FROM categorie ORDER BY id DESC";
$results = dbQuery($sql);
$rows = array();
if (mysqli_num_rows($results) > 0) {
    while($row = dbFetchAssoc($results)) {
		$rows[] = $row;
	}

    echo json_encode($rows);
} else {
    echo json_encode(["success" => 0]);
}