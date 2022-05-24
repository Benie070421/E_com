<?php
if (!empty($_GET['user'])) {
  $id_user = $_GET['user'];
}
$check = "SELECT * FROM article LEFT JOIN panier ON panier.id_panier = article.panier WHERE `user_id` ='$id_user' AND `etatPanier` = '0' ";
$result = mysqli_query($conn, $check);
$nombre = mysqli_num_rows($result);
if ($nombre === 0) {
  $nombre = "";
} else {
  $nombre = $nombre;
};
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="#">
      <h1 class=" display-3 text-primary fw-semi-bold font-base">
        ECOM
      </h1>
    </a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base" style="font-size:1.25rem">
        <li class="nav-item"><a class="nav-link fw-medium active" aria-current="page" href="lndex.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="produits.php">Achat</a></li>
        <li class="nav-item"><a class="nav-link" href="vente.php">Vente</a></li>
        <li class="nav-item"><a class="nav-link" href="commande.php">Panier<i class="fa fa-shopping-cart"><?php echo $nombre ?></i></a></li>
        <li class="nav-item"><a class="nav-link" href="setting.php?user=<?= $id_user ?>">Compte<i class="fa fa-user-cog"></i></a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">A propos</a></li>
      </ul>
      <form action="logout.php" class="ps-lg-5">
        <button class="btn btn-lg btn-primary rounded-pill bg-gradient font-base order-0" type="submit" style="font-size:1.25rem">Déconnexion</button>
      </form>
    </div>
  </div>
</nav>