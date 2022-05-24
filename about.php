<?php
session_start();
// ob_start();
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
    <section class="py-8 pb-2" id="books">
      <div class="container login-container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 col-md-6 login-form-1">
            <h1 class="display-1 font-weight-bold text-center text-warning" >A PROPOS</h1>
            <p class="text-center fw-black" style="font-size: x-large; color:#1a1a1a;">ECOM est une plateforme digitale de vente et achat de toutes types de produits.</p>
          </div>
          <div class="col-lg-6 col-md-6 login-form-2">
            <img class="img-fluid" src="assets/ecom.jpg">
          </div>
        </div>
      </div>
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
  <script>
    $('.brand-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
})

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>