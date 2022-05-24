<?php
include 'API/database/connexion.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php include("includes/header.php"); ?>

  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
    <?php include("includes/nav.php"); ?>
          <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-8 pb-4" id="books">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center mb-7">
              <h1 class="fw-semi-bold text-warning">LISTES <span class="text-1100"> DES PRODUITS</span></h1>

            </div>

        <form class="col-lg-12 mb-3" method="POST" action="" style="text-align:center">
            
            <button type="submit" class="btn btn-lg btn-primary rounded-pill font-base" name="search"> <i class="fa fa-search"></i></button>
            <input type="text" class="col-3 form-ctrl rounded-pill border-0 font-base" aria-label="Small" name="recherche" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
        
              <select class="col-3 form-ctrl  border-0 font-base" id="country" name="categorie">
                  <option value="au">Categorie</option>
                  <?php  
                        
                          $sql = "SELECT * FROM categorieproduit";
                          $results = dbQuery($sql);
                          $rows = array();
                          while($row = dbFetchAssoc($results)) {
                            

                              ?> <option value="<?= $row['id_categorie']?>"><?= $row['category_name']?></option>

                              <?php
                          }?>
              </select>
              
        </form>
        <?php
        if (isset($_POST['search'])){
          $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
          // $localite = isset($_POST['localite']) ? $_POST['localite'] : '';
          $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
          $sql = "SELECT * FROM produit LEFT JOIN user ON user.id_user = produit.vendeur WHERE intitule LIKE '%$recherche%' OR categorie LIKE '$categorie' ";
          $results = dbQuery($sql);
          $nombre = mysqli_num_rows($results);
          $rows = array();
          
          while($row=dbFetchAssoc($results)){
          if ($nombre > 0 ){

           ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                  <div class="card" style="border-radius:0;width:300px; height:250px">
                    <img class="card-img-top img-fluid p-2" src="imageProduits/<?= $row['image']; ?>" alt="<?= $row['intitule'] ?>" style="border-radius:0; width:300px; height:250px" />
                    <div class="card-body">
                      <h3 class="card-title"><?= ucfirst($row["intitule"]); ?></h3>
                      <p class="card-text"><?= $row["prix"]; ?> FCFA<br>
                        <?= ucfirst($row['localite']); ?>
                      </p>
                      <a class="btn btn-primary" href="details.php?ide=<?= $row['id']; ?>">Détails</a>
                    </div>
                  </div>
              </div>
            <?php

              
          }
        }

        }else{
          include("includes/productList.php");

        }

      ?>
            
          </div>
        </div>
        <!-- end of .container-->

      </section>
      
    <?php include("footer.php");?>
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