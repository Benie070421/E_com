<?php
// Start the session
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php include("includes/header.php"); ?>
<style>
</style>
  <body>
  <?php include("includes/nav.php"); ?>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- <section> begin ============================-->
      <section class="py-8" id="books">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-md-9 col-sm-12 p-6 m-4" style="background-color: #6dcb62;">
              <?php include("includes/formulaireLogin.php"); ?>
            </div>
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