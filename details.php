<?php
// Start the session
session_start();
ob_start();
require_once 'API/database/connexion.php';
include 'session.php';
$produit = $_GET['ide'];

if (isset($_POST['ajouter'])){
  $produit= mysqli_escape_string($conn, addslashes($_POST['produit'])) ;
  $qte= mysqli_escape_string($conn, addslashes($_POST['quantité_voulu'])) ;
  // Vérification que l'utilisateur n'a pas de panier en cours
  $panier_check = "SELECT * FROM `panier` WHERE `user_id` = '$id_user' AND `etatPanier` = '0'";
  $res = mysqli_query($conn, $panier_check);
  if(mysqli_num_rows($res) > 0){
    $fetch_panier = mysqli_fetch_assoc($res);
    $panier = $fetch_panier['id_panier'];
    // Vérification que le panier ne contient pas déjà le produit sélectionné
    $prod_check = "SELECT * FROM `article` LEFT JOIN produit ON produit.id = article.produit WHERE `panier` = '$panier' AND `produit` = '$produit' ";
    $prod_res = mysqli_query($conn,$prod_check);
    $fetch_article = mysqli_fetch_assoc($prod_res);
    $anc_qte = $fetch_article['qte'];
    $stock_dispo = $fetch_article['quantite'];
    $new_qte = intval($anc_qte) + intval($qte);
    if(mysqli_num_rows($prod_res) > 0){
      // Vérification du stock disponible pour un éventuel ajouter
      if ($new_qte > $stock_dispo) {
        $_SESSION['info'] = [
          "type" => "danger",
          "msg" => "Désolé, nous n'avons pas suffisamment ce produit en stock pour mettre à jour sa quantité dans votre panier !"
      ];
      } else {
        // Actualisation de la quantité de l'article
        $update_qte = "UPDATE `article` SET `qte`='$new_qte' WHERE `panier`='$panier' AND `produit`='$produit' ";
        $run_update_qte =  mysqli_query($conn, $update_qte);
        if($run_update_qte) {
          $_SESSION['info'] = [
            "type" => "success",
            "msg" => "La quantité du produit a été mise à jour avec succès !" ,
          ];
        } else {
          $_SESSION['info'] = [
            "type" => "danger",
            "msg" => "Echec de la mise à jour de la quantité du produit !" ,
          ];
        }
      }
    } else {
      // Ajout du produit parmi les articles du panier de l'utilisateur
      $insert_article = " INSERT INTO `article`(`produit`, `qte`, `panier`) VALUES ('$produit','$qte','$panier')" ;
      $data_insert = mysqli_query($conn, $insert_article);
      if($data_insert) {
        $_SESSION['info'] = [
          "type" => "success",
          "msg" => "Le produit a été ajouté avec succès à votre panier !" ,
        ];
      } else {
        $_SESSION['info'] = [
          "type" => "danger",
          "msg" => "Echec de l'ajout du produit à votre panier ! Veuillez contactez les administrateurs si le problème persiste !" ,
        ];
      }
    }
  } else {
    // Création d'un panier pour l'utilisateur
    $create_panier = " INSERT INTO `panier` (`user_id`) VALUES ('$id_user') ";
    $data_panier = mysqli_query($conn, $create_panier);
    if($data_panier) {
      // Sélection du panier de l'utilisateur
    $panier_check = "SELECT * FROM `panier` WHERE `user_id` = '$id_user' AND `etatPanier` = '0' ";
      $res = mysqli_query($conn, $panier_check);
      if(mysqli_num_rows($res) > 0){
        $fetch_panier = mysqli_fetch_assoc($res);
        $id_panier = $fetch_panier['id_panier'];
        // Ajout du produit parmi les articles du panier de l'utilisateur
        $ajout_article = "INSERT INTO `article`(`produit`, `qte`, `panier`) VALUES ('$produit','$qte','$id_panier') ";
        $data_ajout = mysqli_query($conn, $ajout_article);
        if ($data_ajout) {
          $_SESSION['info'] = [
            "type" => "success",
            "msg" => "Le produit a été ajouté avec succès à votre panier !" ,
          ];
        } else {
          $_SESSION['info'] = [
            "type" => "danger",
            "msg" => "Echec de l'ajout du produit à votre panier ! Veuillez contactez les administrateurs si le problème persiste ! $produit  -  $qte  - $id_panier " ,
          ];
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include("includes/header.php"); ?>

<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <?php include("includes/navbar.php"); ?>
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-8" id="books">

      <div class="container">
        <div class="row justify-content-center">
          <?php
          if (!empty($_SESSION['info']) ) {
          ?>
            <div class="col-12  mb-5" id="alert">
              <div class="alert alert-<?= $_SESSION['info']['type'] ?> alert-dismissible  mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" style="pointer-events:none;">&times;</span>
                </button>
                <?= $_SESSION['info']['msg']; ?>
              </div>
            </div>
              <script>
                const msgAlert = document.querySelector("#alert");
                const btnClose = document.querySelector(".close");
                btnClose.addEventListener('click', () => {
                  msgAlert.remove();
                });
              </script>
            <?php
          }
          unset($_SESSION['info']);
            ?>
            <div class="col-md-8 col-lg-6 text-center mb-7">
              <h1 class="fw-semi-bold text-warning">DETAILS <span class="text-1100"> DU PRODUIT</span></h1>
            </div>

            <?php include("includes/details.php"); ?>

            <!-- <div class="col-lg-12 d-flex justify-content-center">
              <button class="btn btn-lg btn-primary rounded-pill font-base" type="submit">Find More </button>
            </div> -->
            </div>
        </div>
        <!-- end of .container-->

    </section>


  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <?php include("includes/jsScript.php"); ?>
  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
</body>

</html>