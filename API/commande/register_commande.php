<?php
//////////////////////Enregistrer une commande ///////////////////

require_once '../database/connexion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
    $quantité_voulu = addslashes($_POST['quantite']);
    $idpro = addslashes($_POST['id']);
	$iduser = addslashes($_POST['id_user']);
	$datetime = date("Y-m-d h:i:sa");

	$check = "SELECT * FROM commande WHERE produit ='$idpro' AND client ='$iduser'";
	$resultc = dbQuery($check);
	$rowc = dbFetchAssoc($resultc );
	$lastqte = $rowc['qteCommande'];
	$idcom = $rowc['id'];
	$newqte= $quantité_voulu + $lastqte;
	$resultt = mysqli_query($conn, $check);
	$nombre = mysqli_num_rows($resultt);

	if ($nombre == 1) {
		$sql = "UPDATE commande SET qteCommande = '$newqte' WHERE id ='$idcom'";
		$result = dbQuery($sql);
		if ($result) {
			echo json_encode(array('success' => 'commande enregistrer avec succes!'));
		  } else {
			echo json_encode(array('error' => 'commande non enregister!'));
		  }
	  }else{

	  $sql = "INSERT INTO commande(produit,client,qte_commandé,dateCommande,etatCommande) VALUES('$idpro','$iduser','$quantité_voulu','$datetime','1')";
	  $result = dbQuery($sql);
	  if ($result) {
		echo json_encode(array('success' => 'commande enregistrer avec succes!'));
	  } else {
		echo json_encode(array('error' => 'commande non enregister!'));
	  }
	  }

}