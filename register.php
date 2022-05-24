<?
session_start();
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include("includes/header.php"); ?>

  <body>
  <?php include("includes/nav.php"); ?>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
          <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-8" id="books">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-9 p-5" style="background-color: #6dcb62;">
            <?php require_once("includes/formulaireRegister.php"); ?>
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