<?php
session_start();
ob_start();
include 'API/database/connexion.php';
include 'session.php';
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

          <?php {
            include("views/validationpaiement.php");
          }
          ?>
          <div class="col-lg-12 d-flex justify-content-center mb-5">
              <a href="Index.php" class="btn btn-lg btn-warning rounded-pill font-base">Retour à l'accueil </a> 
          </div>
    <?php include("footer.php"); ?>
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