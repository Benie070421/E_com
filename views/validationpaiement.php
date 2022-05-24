<?php
// ob_start();
?>
<?php
$id_com = $_SESSION["id_com"];
// Sélection de l'utilisateur 
$sql = "SELECT * FROM user LEFT JOIN cart ON cart.client = user.id_user WHERE `id_user` = '$id_user' AND id_commande = $id_com ";
$run_Sql = mysqli_query($conn, $sql);
if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);

    $status = $fetch_info['statut'];
    $idClient = $fetch_info['id_user'];
    $nomClient = $fetch_info['nom'];
    $prenomClient = $fetch_info['prenom'];
    $emailClient = $fetch_info['email'];
    $contactClient = $fetch_info['contact'];
    $localiteClient = $fetch_info['localite'];
    $commande = $fetch_info['id_commande'];
    $dateCommande = $fetch_info['dateCommande'];
    $panier_id = $fetch_info['panier_id'];
}
?>


<section class="py-8 pb-3">
    <main>
        <div class="container">
            <!-- Row start -->
            <div class="row gutters text-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="custom-actions-btns mb-5" style="text-align: -webkit-center;">
                        <h1 class="text-primary display-3">Votre commande a été enregistrée avec succès !</h1>
                        <div class="col-8">
                        <h3 class="text-info">Nos équipe vous contacterons dans les prochains jours  pour vous livrer vos marchandises</h3>
                        </div>
                        <!-- <a href="#" class="btn btn-primary">
                            <i class="icon-download"></i> Télécharger
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="icon-printer"></i> Imprimer
                        </a> -->
                    </div>
                </div>
            </div>
            <!-- Row end -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="../Index.php" style="color: #212529;">ECOM </a>

                            <div class="float-right" style="float:right!important">
                                <h3 class="mb-0">Facture N° <?= $commande ?></h3>
                                Date: <?= $dateCommande ?>
                            </div>
                        </div>
                        <div class="card-body" style="color: #212529">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h5 class="mb-3">De:</h5>
                                    <h3 class="text-dark mb-1">ECOM</h3>

                                    <div>Cocody, Abidjan</div>
                                    <!-- <div>Sikeston, MO 63801</div> -->
                                    <div>Email: ecom@gmail.com </div>
                                    <div>Contact: +225 /0707070707/ 0101010101</div>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="mb-3">Doit:</h5>
                                    <h3 class="text-dark mb-1"><?= ucfirst($prenomClient) . " " . strtoupper($nomClient) ?></h3>
                                    <div><?= ucfirst($localiteClient) ?></div>
                                    <!-- <div>Canal Winchester, OH 43110</div> -->
                                    <div>Email: <?= $emailClient ?></div>
                                    <div>Contact: <?= $contactClient ?></div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center">Référence</th>
                                            <th>Article</th>
                                            <th class="right">Prix Unitaire</th>
                                            <th class="center">Quantité</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Sélection du panier de l'utilisateur et des produits qu'il contient etde ses informations personnelles
                                        $com = $_SESSION['id_com'];
                                        $check_cart = " SELECT * FROM `article` LEFT JOIN cart ON cart.panier_id = article.panier LEFT JOIN produit ON produit.id = article.produit WHERE `id_commande` = '$com'  ";
                                        $run_check_cart = mysqli_query($conn, $check_cart);
                                        if ($run_check_cart) {
                                            $sTotal = 0;
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($run_check_cart)) {
                                        ?>
                                                <tr>
                                                    <td class="center"> <?= $i ?> </td>
                                                    <td class="center"> <?= $row['id'] ?> </td>
                                                    <td class="left strong"> <?= ucfirst($row['intitule']) ?> </td>
                                                    <td class="right"> <?= $row['prix'] ?> </td>
                                                    <td class="center"><?= $row['qte'] ?></td>
                                                    <?php $cout = $row['prix'] * $row['qte']   ?>
                                                    <td class="right"> <?= $cout ?> </td>
                                                </tr>
                                            <?php
                                                $sTotal += $cout;
                                                $i++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-2">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Sous-total</strong>
                                                </td>
                                                <td class="right"><?= $sTotal ?></td>
                                            </tr>
                                            <!-- <tr>
                                    <td class="left">
                                        <strong class="text-dark">Réduction (20%)</strong>
                                    </td>
                                    <td class="right"></td>
                                </tr> -->
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">TVA (18%)</strong>
                                                </td>
                                                <td class="right"><?= intval($sTotal) * 0.18 ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark"><?= $sTotal * 1.18 ?></strong>
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                            $errors['otp-error'] = "Aucune commande!";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

