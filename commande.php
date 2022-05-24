<?php
/////////////////////////////////////OBTENles Produits DE L'UTILISATEUR ajouter dans le panier /////////////////////////////////////
session_start();
ob_start();
require_once 'API/database/connexion.php';
include 'session.php';

if (isset($_POST['delete'])) {
  $panier = mysqli_escape_string($conn, addslashes($_POST['panier']));
  $id_produit = mysqli_escape_string($conn, addslashes($_POST['id_produit']));
  $delete = "DELETE FROM `article` WHERE `panier`='$panier' AND `produit` = '$id_produit';";
  $run_delete = mysqli_query($conn, $delete);
  if ($run_delete) {
      $_SESSION['info'] = "Le produit a bien été supprimé de votre panier d'achat !" ;
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
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
            <div class="col-md-8 col-lg-6 text-center mb-4">
              <h1 class="fw-semi-bold text-warning">MON <span class="text-1100"> PANIER</span></h1>
            </div>
            <?php include("includes/commandeList.php"); ?>
            <div class="col-lg-12 d-flex justify-content-center">
              <a href="produits.php" class="btn btn-lg btn-warning rounded-pill font-base">Continuer mes achats </a> &nbsp &nbsp &nbsp
              <a href="buy.php?montant=<?= $montant ?>" class="btn btn-lg btn-primary rounded-pill font-base" type="submit">Passer au paiement </a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
    
    
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <script>

 var cout = document.querySelectorAll(".cout");
 var prixTotal_achat = document.querySelector(".prixTotal");
 var ttc = document.querySelector('.ttc');
 var copie= [];
 var prixTotal = "0";


 for (var i = 0; i < cout.length; i++) {
  copie.push(cout[i].innerText);
  prixTotal =  parseInt(prixTotal) + parseInt(copie[i])
  prixTotal_achat.innerText = prixTotal;
  ttc.innerText = parseInt(prixTotal_achat.innerText) +  parseInt(0);
}



</script>
    <?php include("includes/jsScript.php"); ?>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
  </body>

</html>