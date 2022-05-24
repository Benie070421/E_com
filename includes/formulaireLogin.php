<?php
$_SESSION['email']="";
//Inclusion de la connexion à la BD
include 'API/database/connexion.php';

//login
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, strtolower(addslashes(trim($_POST['email']," "))));
  // $contact = addslashes($_POST['contact']);
  $password = mysqli_real_escape_string($conn, md5(addslashes(trim($_POST['password']," "))));

  //check user
  $check = "SELECT * FROM `user` WHERE `email` ='$email' ";
  $result = mysqli_query($conn, $check);
  $nombre = mysqli_num_rows($result);

  if ($nombre == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $mdp = $row['password'];
    // Vérification de la correespondance des mots de passe
    if ($password == $mdp) {
      $id = $row['id_user'];
      //Création de la session
      $_SESSION["id"] = $id;
      header('Location: lndex.php');
    } else {
      $_SESSION['errors'] = "Mot de passe incorrecte! veuillez réesayer!";
    }
  } else {
    //afficher message d'erreure
    $_SESSION['errors'] = "Adresse email invalide! veuillez réesayer!";
  }
}
//fin login
mysqli_close($conn);
?>
<!-- Formulaire de connexion -->
<form action="" method="post" enctype="multipart/form-data">
  <h3>Se connecter</h3>
  <p class="lead">Vous n'avez pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
  <?php
  if (isset($_SESSION['errors'])) {
  ?>
    <div class="alert alert-danger text-center">
      <?= $_SESSION['errors']; ?>
    </div>
  <?php
  }
  unset($_SESSION['errors']);
  ?>
  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="" name="email" value="<?= $_SESSION['email'] ?>"required>
    <label for="floatingInput">Adresse e-mail</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password" required>
    <label for="floatingPassword">Mot de passe</label>
  </div>
  <button type="submit" class="btn btn-primary mt-3" name="login" >Se connecter</button>
</form>
<div class="form-group">
  &nbsp &nbsp &nbsp<a href="login/forgot-password.php" class="ForgetPwd"><span>Mot de passe oublié ?</span></a>
</div>

