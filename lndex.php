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
    <?php
    if (!empty($_SESSION['info'])) {
    ?>
        <div class="col-12 mt-7" id="alert">
          <div class="alert alert-success alert-dismissible  mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" style="pointer-events:none;">&times;</span>
            </button>
            <?= $_SESSION['info']; ?>
          </div>
        </div>
        <script>
          const msgAlert = document.querySelector("#alert") ;
          const btnClose = document.querySelector(".close") ;
          btnClose.addEventListener('click', () => {
            msgAlert.remove();
          });
        </script>

    <?php
    }
    unset($_SESSION['info'])
    ?>
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-12" id="books">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-12 text-center mb-7">
            <h1 class="fw-semi-bold text-warning">PRODUITS <span class="text-1100"> RECENTS</span></h1>
          </div>

          <?php {
            include("includes/productListRec.php");
          }
          ?>

          <div class="col-lg-12 d-flex justify-content-center mt-5">
            <a href="produits.php"><button class="btn btn-lg btn-primary rounded-pill font-base" type="submit" style="font-size:1.25rem">Voir Plus</button></a>
          </div>
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