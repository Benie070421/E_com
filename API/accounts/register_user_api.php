<?php

//////////////Api d'enregistrement d'utilisateur//////////////////

require_once '../database/connexion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	$nom = mysqli_real_escape_string($conn, strtolower(addslashes($_POST['nom'])));
	$prenom = mysqli_real_escape_string($conn, strtolower(addslashes($_POST['prenom'])));
	$email = mysqli_real_escape_string($conn, strtolower(addslashes($_POST['email'])));
	$genre = mysqli_real_escape_string($conn, strtolower(addslashes($_POST['genre'])));
	$contact = mysqli_real_escape_string($conn, addslashes($_POST['contact']));
	$localité = mysqli_real_escape_string($conn, strtolower(addslashes($_POST['localite'])));
	$password = mysqli_real_escape_string($conn, md5(addslashes($_POST['password'])));
	$cpassword = mysqli_real_escape_string($conn, md5(addslashes($_POST['cpassword'])));
	$datetime = date("d F Y");

	if ($password !== $cpassword) {
		$errors['password'] = "Les mots de passe ne correspondent pas!";
	}

	//Vérification que l'email n'est pas déjà utilisé par un utilisateur de la plateforme
	$check = "SELECT * FROM `user` WHERE `email` ='$email'";
	$result = mysqli_query($conn, $check);
	$nombre = mysqli_num_rows($result);
	$user_type = 2;
	$session['email'] = $email;
	if ($nombre > 0) {
		$errors['email'] = "L'email que vous avez entré est déjà utilisé par un utilisateur! S'il s'agit de vous, cliquer sur <a href='login.php'>je me connecte</a> pour rejoindre la page de connexion ou utiliser l'option <a href='#'>'Mot de passe oublié'</a> si vous ne vous souvenez plus de votre mot de passe!  ";
	}

	// Téléchargement de l'image de profil de l'utilisateur sur le serveur
	$file = $_FILES['image'];
	if ($file['size'] > 0) {
		$dir = "imagesUser/";
		if (!isset($file['name']) || empty($file['name'])) {
			$errors['image'] = "Vous devez indiquer une image !";
		}

		if (!file_exists($dir)) mkdir($dir, 0777);

		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
		$random = rand(0, 99999);
		$nomImage = $random . "_" . $file['name'];
		$target_file = $dir . $nomImage;

		if (!getimagesize($file["tmp_name"]))
			$errors['image'] = "Le fichier n'est pas une image !";
		if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
			$errors['image'] = "L'extension du fichier n'est pas reconnu !";
		if (file_exists($target_file))
			$errors['image'] = "Le fichier existe déjà !";
		if ($file['size'] > 500000)
			$errors['image'] = "Le fichier est trop gros !";
		if (!move_uploaded_file($file['tmp_name'], $target_file))
			$errors['image'] = "Désolé mais L'ajout de l'image n'a pas fonctionné !";
	} else {
		$errors['image'] = "Aucune photo de profil n'a été sélectionné";
	}

	if (count($errors) == 0) {
		$encpass = password_hash($password, PASSWORD_BCRYPT);
		//insertion
		$sql = "INSERT INTO user(`nom`,`prenom`,`email`,`genre`,`contact`,`localite`,`password`,`userType`,`statut`,`image_user`,`dateInscription`) VALUES(
			'$nom',
			'$prenom',
			'$email',
			'$genre',
			'$conntact',
			'$localite',
			'$password',
			'$user_type',
			'1',
			'$nomImage',
			'$datetime'
			)";


		if (mysqli_query($conn, $sql)) {
			header('Location: Index.php');
			echo json_encode(array('success' => 'Vous vous êtes inscrit avec succès'));
		} else {
			echo json_encode(array('error' => "Une erreur s\' est produite lors de l'inscription, veuillez contacter l\'administrateur"));
		}
	}
}
