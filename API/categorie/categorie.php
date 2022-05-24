<?php

//////////////Api d'enregistrement d'utilisateur//////////////////

require_once '../database/connexion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));

	$sql = "INSERT INTO categorie(intitule_cat) VALUES(
        '" . mysqli_real_escape_string($conn, $data->categorie_name) . "'
		)";
	
	$result = dbQuery($sql);
	if ($result) {
		$last_id = mysqli_insert_id($conn);
		echo json_encode(["success" => 1, "msg" => "Categorie Inserted.", "id" => $last_id]);
	} else {
		echo json_encode(["success" => 0, "msg" => "Categorie Not Inserted!"]);
	}
}

