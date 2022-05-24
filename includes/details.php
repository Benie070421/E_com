<?php

if (isset($_GET['ide'])) { //verification si on a un get
  //verification si l'information get egale a l'id dans la session


  $id_pro = $_GET['ide'];

  $sql = "SELECT * FROM produit WHERE id ='$id_pro' ";
  $resulta = dbQuery($sql);
  $rowa = dbFetchAssoc($resulta);
?>
<div class="col-xl-10  col-sm-12 col-xs-12">
  <div class="card-deck my-3 mx-3">

    <div class="card mt-2">
      <img class="img-thumbnail" style="height: 358px;; width:auto;" src="imageProduits/<?= $rowa['image'] ?>" alt="Card image cap">
    </div>

    <div class="card">
      <div class="card-body">
        <h3 class="card-title"><?= ucfirst($rowa['intitule']) ?></h3>
        <p class="card-text"><?= ucfirst($rowa['description']) ?></p>


        <div class="row">
          <div class="col-md-3">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group ">
                <label  class="lead fw-semi-bold" for="quantité_voulu">Quantité (en Kg):</label>
                <input type="number" class="form-control " id="quantité" name="quantité_voulu" value="<?=$rowa['qteFinal']?>">
                <input type="hidden" name="produit" value="<?= $produit;?>">
                <button type="submit" class="btn btn-primary mt-2" name="ajouter">Ajouter au panier <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
          <div class="col-md-9" style="text-align-last: center;">
            </br>
            <h5>Prix au kg : </h5>
            <h5 class="prix"><span><?php echo $rowa['prix'] ?></span> FCFA</h5>
            <h5>Total a payer:<div class="resultat">
                <span></span> FCFA
              </div>
            </h5>
            <a href="produits.php" class="btn btn-info">Retour</a>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
  <?php
}

  ?>
<?php



  //ajouter au panier
  // if (isset($_POST['ajouter'])) {
  //   //collecte information

  //   $quantité_voulu = addslashes($_POST['quantité_voulu']);
  //   $idpro = addslashes($_GET['ide']);
  //   $datetime = date("Y-m-d h:i:sa");

  //   $check = "SELECT * FROM commande WHERE produit ='$idpro' AND client ='$id'";
  //   $resultc = dbQuery($check);
  //   $rowc = dbFetchAssoc($resultc);
  //   $lastqte = $rowc['qteCommande'];
  //   $idcom = $rowc['id_commande'];
  //   $newqte = $quantité_voulu + $lastqte;
  //   $resultt = mysqli_query($conn, $check);
  //   $nombre = mysqli_num_rows($resultt);

  //   if ($nombre == 1) {
  //     $sql = "UPDATE commande SET qteCommande = '$newqte' WHERE id_commande ='$idcom'";

  //     if (mysqli_query($conn, $sql)) {
  //       header('Location:commande.php');
  //     } else {
  //       echo "Error updating record: " . mysqli_error($conn);
  //     }
  //   } else {

  //     $sql = "INSERT INTO commande(produit,client,qteCommande,dateCommande,etatCommande) VALUES('$idpro','$id','$quantité_voulu','$datetime','1')";

  //     if (mysqli_query($conn, $sql)) {
  //       header('Location:commande.php');
  //     } else {
  //       echo "Error updating record: " . mysqli_error($conn);
  //     }
  //   }
  // } 
  
  //    SCRIPT A PEAUFINER POUR UTILISER APRES CHAQUE COMMANDE  //
  // Sélection de la quantité du stock du produit
          // $prod_check = "SELECT * FROM `produit` WHERE `id` = '$produit' ";
          // $prod_res = mysqli_query($conn,$prod_check);
          // // if(mysqli_num_rows($prod_res) > 0){
          //   $fetch_prod = mysqli_fetch_assoc($prod_res);
          //   $qte_stock = $fetch_prod['qteFinal'];
            
          // }
          // Actualisation du stock de Produits
          // $update_qte = "UPDATE `produit` SET `qte`='$qte' WHERE `panier`='$panier' AND `produit`='$produit' ";
          // $run_update_qte =  mysqli_query($conn, $update_qte)?>
  <script>
    let quantité = document.querySelector("#quantité");
    const prix = document.querySelector(".prix span").textContent;
    let resultat = document.querySelector(".resultat span");
    const total = parseInt(prix)*parseInt(quantité.value);
    resultat.innerText = total;
    
      quantité.addEventListener('input' , () => {
        const qté = document.querySelector("#quantité").value;
        const totall = parseInt(prix)*parseInt(qté);
        resultat.innerText = totall;
      })
  </script>