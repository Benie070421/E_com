<?php


require_once '../database/connexion.php';
require_once '../jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	$password= md5($data->password);
	
    $sql = "SELECT * FROM user WHERE email = '" . mysqli_real_escape_string($conn, $data->email) . "' AND password = '$password' LIMIT 1";
	$result = dbQuery($sql);
	
	if(dbNumRows($result) < 1) {
		echo json_encode(array('error' => 'Invalid User'));
	} else {
		$row = dbFetchAssoc($result);
		
		$email = $row['email'];
		$id = $row['id'];
		
		$headers = array('alg'=>'HS256','typ'=>'JWT');
		$payload = array('email'=>$email);

		$jwt = generate_jwt($headers, $payload);

        $sql ="UPDATE user SET token = '$jwt' WHERE email = '" . mysqli_real_escape_string($conn, $data->email)."'" ;
        $result = dbQuery($sql);
		
		echo (json_encode(array('token' => $jwt, 'user_id' => $id),JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
}

?>