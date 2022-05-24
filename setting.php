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
            <h1 class="fw-semi-bold text-warning">PROFIL DE <span class="text-1100"> L'UTILISATEUR</span></h1>
          </div>

          <?php {
            include("views/info.profil.php");
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
  <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="vendor/js/ruang-admin.min.js"></script>
            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable(); // ID From dataTable 
                    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
                });
            </script>
  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
</body>

</html>