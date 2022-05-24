<?php
/////////////////////////////////////OBTENIR LES PRODUITs DE L'UTILISATEUR EN UTILISANT SON TOKEN/////////////////////////////////////

require_once 'API/database/connexion.php';
$check = "SELECT * FROM produit WHERE statutProduit_id = '2'";
$result = mysqli_query($conn, $check);
$nombre = mysqli_num_rows($result);

//Pagination

// définir combien de résultats vous voulez par page
$results_per_page = 4;

//DEBUT DE LA PAGINATION
// déterminer le nombre total de pages disponibles
$number_of_pages = ceil($nombre / $results_per_page);


// déterminer sur quel numéro de page se trouve actuellement le visiteur
if (!isset($_GET['page'])) {
  $page = 1;
} else if ($_GET['page'] > $number_of_pages) {
  $page = $_GET['page'];
  $page = 1 ;
} else {
  $page = $_GET['page'];
}



// déterminer le numéro de départ sql LIMIT pour les résultats sur la page d'affichage
$this_page_first_result = ($page - 1) * $results_per_page;


$sql = "SELECT * FROM produit LEFT JOIN user ON user.id_user = produit.vendeur WHERE statutProduit_id = '2' ORDER BY id LIMIT $this_page_first_result,$results_per_page ";
$results = dbQuery($sql);
$rows = array();
while ($row = dbFetchAssoc($results)) {
  $rows[] = $row;

  if (mysqli_num_rows($results) == 0) {
?> <h1><?php echo " AUCUN PRODUIT N'EST DISPONIBLE ACTUELLEMENT " ?> </h1>


  <?php
  } else {
  ?>

    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
      <div class="card" style="border-radius:0;">
        <img class="card-img-top img-fluid p-2" src="imageProduits/<?= $row['image']; ?>" alt="<?= $row['intitule'] ?>" style="border-radius:0;" />
        <div class="card-body">
          <h3 class="card-title"><?= ucfirst($row["intitule"]); ?></h3>
          <p class="card-text"><?= number_format($row["prix"],0,",","."); ?> FCFA - Qté: <?= $row['qteFinal'] ?> Kg<br>
            <?= ucfirst($row['localite']); ?>
          </p>
          <a class="btn btn-primary" href="details.php?ide=<?= $row['id']; ?>">Détails</a>
        </div>
      </div>
    </div>
<?php


  }
}
?>


<div class="col-lg-12 d-flex justify-content-center mt-5">
  <?php
  for ($i = 1; $i <= $number_of_pages; $i++) {

    if ($i == $page) {
      echo '<a href="" class="paginations"> <button class="btn btn-lg btn-danger rounded-pill font-base" type="submit">' . $i . '</button></a> &nbsp';
    } else {
      echo '<a href="produits.php?page=' . $i . '" class="paginations"> <button class="btn btn-lg btn-primary rounded-pill font-base" type="submit">' . $i . '</button></a> &nbsp';
    }
  }

  ?>

  <!-- Find More </button> -->
</div>