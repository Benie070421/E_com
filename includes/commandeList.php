<?php
$errors = array();
if (!empty($_SESSION['info'])) {
?>
  <div class="col-12 mb-4" id="alert">
    <div class="alert alert-success alert-dismissible  mb-0" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="pointer-events:none;">&times;</span>
      </button>
      <?= $_SESSION['info']; ?>
    </div>
  </div>
  <script>
    const msgAlert = document.querySelector("#alert");
    const btnClose = document.querySelector(".close");
    btnClose.addEventListener('click', () => {
      msgAlert.remove();
    });
  </script>
<?php

}
unset($_SESSION['info']);
?>
<?php
if (count($errors) > 0) {
?>
  <div class="alert alert-danger text-center">
    <?php
    foreach ($errors as $showerror) {
      echo $showerror;
    }
    ?>
  </div>
<?php
}

?>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>

      <tr>
        <th scope="col"> # </th>
        <th scope="col">Image du produit </th>
        <th scope="col">Produit</th>
        <th scope="col">Prix unitaire</th>
        <th scope="col">Quantité</th>
        <th scope="col">Total</th>
        <!-- <th scope="col">Statut</th> -->
        <th> </th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT * FROM article LEFT JOIN produit ON produit.id = article.produit LEFT JOIN panier ON panier.id_panier = article.panier WHERE panier.user_id ='$id_user' AND `etatPanier` = '0' ";
      $result = dbQuery($sql);
      $a = 1;
      $montant = 0;
      while ($row = dbFetchAssoc($result)) {
        $id_pro = $row['id'];
        $type = ucfirst($row['intitule']);
        $prix = $row['prix'];
        $image = $row['image'];
        $qte = $row["qte"];
        $cout = $qte * $prix;
        $panier = $row['panier'];
        $client = $row['user_id'];
      ?>
        <tr>
          <td><?= $a ?></td>
          <td><img src="imageProduits/<?= $image ?>" style="height: 50px;width:50px" /> </td>
          <td><?= $type ?></td>
          <td><?= number_format($prix,0,",",".") ?> FCFA</td>
          <td><?= $qte; ?></td>
          <td class="cout"><?php echo $cout; ?> FCFA</td>
          <form method="post" action="">
            <input type="hidden" name="panier" value="<?= $panier; ?>">
            <input type="hidden" name="id_produit" value="<?= $id_pro; ?>">
            <td class="text-right"><button type="submit" class="btn btn-sm btn-danger " name="delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
          </form>
        </tr>
      <?php
        $a++;
        $montant = $montant + $cout;
      }
      ?>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Sous-Total</td>
        <td class="text-right prixTotal"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>TVA</td>
        <td class="text-right tva">-</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td class="text-right ttc"><strong>0 </strong>FCFA</td>
      </tr>
    </tbody>
  </table>
</div>