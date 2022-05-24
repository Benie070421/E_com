<?
session_start();
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include("includes/header.php"); ?>

  <body style="font-size:1.25rem;">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
    <?php include("includes/nav.php"); ?>
          <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-12" id="books">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 text-center mb-7">
              <h1 class="fw-semi-bold text-warning">PRODUITS <span class="text-1100"> RECENTS</span></h1>
            </div>

            <?php include("includes/productListRec.php"); ?>
            
            <div class="col-lg-12 d-flex justify-content-center">
            <a href="produits.php"><button class="btn btn-lg btn-primary rounded-pill font-base mt-5" type="submit" style="font-family: Georgia, serif; font-size: 1.5rem">Voir Plus</button></a>
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