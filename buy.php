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
    <section class="py-4 pb-3" id="books">

      <div class="container mt-7">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-12 text-center">
            <h1 class="fw-semi-bold text-warning">MODE DE <span class="text-1100"> PAIEMENT</span></h1>
          </div>
          
          <?php {
            include("views/paiement.php");
          }
          ?>
        </div>
      </div>
      <!-- end of .container-->

    </section>
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