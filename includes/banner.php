<section class="py-0" style="background-color: rgb(234, 243, 234);" id="home">

  <!--/.bg-holder-->

  <!-- <div class="bg-holder d-block d-md-none" style="background-image:url(assets/image/logo.png);background-position:right top;background-size:contain; width: 60vw; height:130px">
        </div> -->
  <!--/.bg-holder-->

  <div class="container">
    <div class="row align-items-center min-vh-md-75">
      <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
        <h1 class="mt-6 mb-sm-4 display-1 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7">
          Bienvenue sur<br class="d-block d-lg-none d-xl-block" /> ECO-RECYCLE +</h1>
        <h3 class="display-5">Votre plateforme d'achat et de vente de déchets</h3>
        <p class="mb-4 fs-1">Recherchez des déchets spécifiques à l'aide de la barre de recherche ci dessous</p>
        <div class="pt-3">
          <form method="get" action="" class="recherche">
            <div class="input-group w-xl-75 w-xxl-50 d-flex flex-end-center">
              <input class="form-control rounded-pill border-0 font-base" id="formGroupExampleInput" type="text" placeholder="Nom ou catégorie de déchets" name="object" />
              <input type="image" name='search' class="input-box-icon me-3" src="assets/img/illustrations/search.png" width="18" alt="" style="position: absolute;" />
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
        <img src="assets/image/logo.png" style="width:48vw">
        <!-- <div class="bg-holder d-none d-md-block" style="background-image:url(assets/image/logo.png);background-position:right bottom;background-size:contain;"> -->
      </div>
    </div>
  </div>
</section>

<?php
if ((isset($_GET['search']) OR isset($_GET['object'])) AND !empty($_GET['object'])) {
  $search = strtolower(addslashes(trim($_GET['object']," ")));
  //on recherche dans la base de données
  $sql = "SELECT * FROM produit LEFT JOIN user ON user.id_user = produit.vendeur LEFT JOIN categorieproduit ON categorieproduit.id_categorie = produit.categorie WHERE (intitule LIKE '%$search%' OR category_name LIKE '%$search%') AND statutProduit_id = '2' ORDER BY id DESC";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    ?>
  <div class="container">
    <div class="row">

    
    <?php
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
        <div class="card" style="border-radius:0;">
          <img class="card-img-top img-fluid p-2" src="imageProduits/<?= $row['image']; ?>" alt="<?= $row['intitule'] ?>" style="border-radius:0;" />
          <div class="card-body">
            <h3 class="card-title fw-semi-bold">
              <?= ucfirst($row["intitule"]); ?></h3>
            <p class="card-text">
            <?= ucfirst($row['category_name']) ?><br>
            <?= number_format($row["prix"],0,",","."); ?> FCFA<br>
              <?= ucfirst($row['localite']); ?>
            </p>
            <a class="btn btn-primary" href="details.php?ide=<?= $row['id']; ?>" style="font-size:1.25rem">Détails</a>
          </div>
        </div>
      </div>
<?php
    }
    echo "</div>
    </div>" ;
  }
} else
?>