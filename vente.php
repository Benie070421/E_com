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
    <section class="py-8" id="books">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-7 col-sm-12 text-center p-4" style="background-color: #6dcb62;">
          <!-- <div class="col-md-9 col-lg-8 text-center mb-7"> -->
            <h1 class="fw-semi-bold text-warning">VENDEZ VOS<span class="text-1100"> PRODUITS</span></h1>
            <h5 class="mb-2">Remplissez le formulaire ci-dessous et nos équipes analyserons votre propositions de vente et vous contacterons dans les plus brefs délais</h5>
          <!-- </div> -->
        <!-- </div> -->
        <!-- <div class="row justify-content-center"> -->
          <!-- <div class="col-xl-5 col-md-7 col-sm-12"> -->
            <?php include("includes/formulaireAjout.php"); ?>
          </div>
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