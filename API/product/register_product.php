<?php
//////////////////////Enregistrer un produit ///////////////////

require_once '../database/connexion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: multipart/form-data");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	$type = addslashes($_POST['type']);
	$categorie = 1;
	$quantité = addslashes($_POST['quantite']);
	$id = addslashes($_POST['vendeur']);
	$description = addslashes($_POST['description']);
	$datetime = date("Y-m-d h:i:sa");
  
  
	$target_dir = "../../imageProduits/";//dossier de reception
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	//if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	//renomer l'image
	$temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$finaldestination = $target_dir. $newfilename;
	//}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], "".$finaldestination)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
		} else {
		echo "Sorry, there was an error uploading your file.";
		}
		}
  
		$sql = "INSERT INTO produit(intitule,categorie,prix,quantite,description,image,vendeur,dateCreated) VALUES(
			'$type',
			'$categorie',
			'0',
			'$quantité',
			'$description',
			'$finaldestination',
			'$id',
			'$datetime')";
	
	$result = dbQuery($sql);
	
	if($result) {
		echo json_encode(array('success' => 'produit enregistrer avec succes!'));
	} else {
		echo json_encode(array('error' => 'produit non enregister!'));
	}
}