<?php
/////////////////////////////////////OBTENIR LES PRODUITs DE L'UTILISATEUR EN UTILISANT SON TOKEN/////////////////////////////////////

require_once 'API/database/connexion.php';
// Obtenir le nombre total de produit en vente sur le site
$count = "SELECT count(id) as cpt FROM produit WHERE statutProduit_id = '2' " ;
$req_count = mysqli_query($conn,$count) ;
$nombre= mysqli_num_rows($req_count);
$tcount = mysqli_fetch_assoc($req_count);
// Pagination
@$page = $_GET['page'] ;
if(empty($page)) $page = 1 ;
$nbre_element_par_page = 4 ;
$nbre_de_page = ceil($tcount["cpt"]/$nbre_element_par_page);
if ($page > $nbre_de_page) $page = 1;
$debut = ($page-1)*$nbre_element_par_page;
// Réccupération des produits
$sql = "SELECT * FROM `produit` LEFT JOIN `user` ON user.id_user = produit.vendeur LEFT JOIN categorieproduit ON categorieproduit.id_categorie = produit.categorie WHERE statutProduit_id = '2' ORDER BY id DESC LIMIT $debut, $nbre_element_par_page";
$results = dbQuery($sql);
$rows = array();
while ($row = dbFetchAssoc($results)) {
  $rows[] = $row;
  if (mysqli_num_rows($results) == 0) {
?> <h1><?php echo " AUCUN PRODUIT N'EST DISPONIBLE ACTUELLEMENT " ?> </h1>

  <?php
  } else { ?>

    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
      <div class="card" style="border-radius:0;">
        <img class="card-img-top img-fluid p-2" src="imageProduits/<?= $row['image']; ?>" alt="<?= $row['intitule'] ?>" style="border-radius:0;width:300px; height:250px"/>
        <div class="card-body">
          <h3 class="card-title fw-semi-bold"><?= ucfirst($row["intitule"]); ?></h3>
          <p class="card-text">
          <?= ucfirst($row['category_name']) ?><br>
          <?= number_format($row["prix"],0,",","."); ?> FCFA - Qté: <?= $row['qteFinal'] ?> Kg<br>
            <?= ucfirst($row['localite']); ?>
          </p>
          <a class="btn btn-primary" href="details.php?ide=<?= $row['id']; ?>" style="font-size:1.25rem">Détails</a>
        </div>
      </div>
    </div>
<?php
  }
}
?>
<div class="col-lg-12 d-flex justify-content-center mt-5">
  <?php
  for ($i = 1; $i <= $nbre_de_page; $i++) {

    if ($i == $page) {
      echo '<a class="paginations"> <button class="btn btn-lg btn-danger rounded-pill font-base" type="submit">' . $i . '</button></a> &nbsp &nbsp';
    } else {
      echo '<a href="Index.php?page='. $i . '" class="paginations"> <button class="btn btn-lg btn-primary rounded-pill font-base" type="submit">' . $i . '</button></a> &nbsp &nbsp';
    }
  }

  ?>

  <!-- Find More </button> -->
</div>