<?php
//Inclusion de la connexion à la BD
include 'API/database/connexion.php';
$errors = array();
//enregistrement
if (isset($_POST['cree'])) {
  $nom = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['nom']," "))));
  $prenom = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['prenom']," "))));
  $email = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['email']," "))));
  $genre = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['genre']," "))));
  $conntact = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['contact']," "))));
  $localite = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['localite']," "))));
  $password = mysqli_real_escape_string($conn, md5(addslashes(trim($_POST['password']," "))));
  $cpassword = mysqli_real_escape_string($conn, md5(addslashes(trim($_POST['cpassword']," "))));;
  $datetime = date("Y-m-d") ;


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
    } else {
      $error['error'] = $sql . "<br>" . mysqli_error($conn);
    }
  }
}
//fin enregistrement
?>

<form action="" method="post" enctype="multipart/form-data">


  <h3>Créer un compte</h3>
  <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous</a></p>
  <?php
  if (count($errors) > 0) {
  ?>
    <div class="alert alert-danger text-center">
      <?php
      foreach ($errors as $showerror) {
        echo $showerror;
      }
      ?>
    </div>
  <?php
  }
  ?>

  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Entrez votre nom" name="nom" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Entrez votre prenom" name="prenom" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col">
      <input type="email" class="form-control" placeholder="Entrez votre email" name="email" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Entrez votre contact" name="contact" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Entrez votre genre" name="genre"  required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <input type="text" class="form-control" placeholder="Entrez votre lieu de residence" name="localite" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="cpassword" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <input type="file" class="form-control" id="image" placeholder="ajouter une photo" name="image" required>
    </div>
  </div>


  <button type="submit" class="btn btn-primary mt-3" name="cree">Créer mon compte</button>
</form>


<?php
ob_get_clean();


?>