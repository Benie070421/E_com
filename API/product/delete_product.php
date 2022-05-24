<?php
/////////////////////////////////////SUPPRIMER LE PRODUITs DE L'UTILISATEUR EN FONCTION DE SON TOKEN/////////////////////////////////////
require_once '../database/connexion.php';
require_once '../jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
// Declarer la variable token qui vas recuperer le taken
$bearer_token = get_bearer_token();

#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);

if($is_jwt_valid) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get posted data
        $data = json_decode(file_get_contents("php://input", true));
        
        $sql = "DELETE FROM produit WHERE id = '" . mysqli_real_escape_string($conn, $data->id) . "'";
        
        $result = dbQuery($sql);
        
        if($result) {
            echo json_encode(array('success' => 'produit supprimer avec succes!'));
        } else {
            echo json_encode(array('error' => 'produit non supprimer!'));
        }
    }

} else {
    
	echo json_encode(array('error' => 'Access refusé'));
}

