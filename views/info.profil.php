<?php
$user=$_GET['user'];
    $check = "SELECT * FROM user LEFT JOIN panier ON panier.user_id = user.id_user WHERE id_user ='$user'  ";
    $result = mysqli_query($conn, $check);// execution requet check
    $nombre = mysqli_num_rows($result);// nombre de resultat
    $row = mysqli_fetch_assoc($result);// sauv information des champs de la table dans row
    $id = $row['id_user'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    $genre = $row['genre'];
    $contact = $row['contact'];
    $localité = $row['localite'];
    $dateInscription = $row['dateInscription'];
    $image = $row['image_user'];
    $panier = $row['id_panier'];
?>
<style>
    a {
        text-decoration: none;
    }

    .avatar {
        /* Center the content */
        display: inline-block;
        vertical-align: middle;

        /* Used to position the content */
        position: relative;

        /* Colors */
        background-color: #F3752B;
        color: #d9ebc4;

        /* Rounded border */
        border-radius: 50%;
        height: 150px;
        width: 150px;
    }

    .avatar__letters {
        /* Center the content */
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: xxx-large;
    }
</style>

<main class="py-8">
<?php
if (!empty($_SESSION['info'])) {
?>
    <div class="col-12  mb-5" id="alert">
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
    <div class="container">
        <div class="main-body">

            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="imagesUser/<?= $image ?>" alt="Admin" class="rounded-circle" width="150">
                                <!-- <div class="avatar"> -->
                                    <!-- <div class="avatar__letters"> -->
                                        <!-- The letters -->
                                        <!-- PN -->
                                    <!-- </div>  -->
                                <!-- </div> -->
                                <div class="mt-3 lead text-dark">
                                    <h4><?= ucfirst($prenom) . " " . strtoupper($nom) ?></h4>
                                    <p class="mb-1"><?= $email ?></p>
                                    <p class="font-size-sm"><?= ucfirst($localité) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body lead text-dark">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom et prénoms </h6>
                                </div>
                                <div class="col-sm-9">
                                    <?= ucfirst($prenom) . " " . strtoupper($nom) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Genre</h6>
                                </div>
                                <div class="col-sm-9">
                                <?= ucfirst($genre) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact</h6>
                                </div>
                                <div class="col-sm-9">
                                    <?= $contact ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Inscrit depuis le</h6>
                                </div>
                                <div class="col-sm-9">
                                    <?= $dateInscription ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn" style="background-color: #FF220C;" href="editSetting.php">Modifier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- justified tabs  -->
        <!-- ============================================================== -->
        <div class="col pt-4 pb-4 mb-3" style="background-color:#d9ebc4;">

            <div class="tab-regular">
                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                    <li class="nav-item" style="margin-right: 0;">
                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Mes produits achetées</a>
                    </li>
                    <li class="nav-item" style="margin-right: 0;">
                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Mes produits vendus</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent7">
                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                        <!-- Section Clients -->
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                        <div class="table-responsive p-3">
                                                <table class="table table-striped text-center" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>N° Commande</th>
                                                            <th>Référence article</th>
                                                            <th>Nom du produit</th>
                                                            <th>Montant</th>
                                                            <th>Date de commande</th>
                                                            <th>Date de livraison</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $check_achat = "SELECT * FROM `cart` WHERE `client`= '$id_user'";
                                                        $runCheck = mysqli_query($conn, $check_achat);
                                                        if ($runCheck) {
                                                            $x = 1;
                                                            while ($assoc = mysqli_fetch_assoc($runCheck)) {
                                                                $panier = $assoc['panier_id'];
                                                        $check_produit = " SELECT * FROM  produit LEFT JOIN article ON article.produit = produit.id WHERE panier= $panier ";
                                                        $req = mysqli_query($conn, $check_produit);
                                                        ;
                                                        while($fetch = mysqli_fetch_assoc($req)) {
                                                        $prix = $fetch['prix'];
                                                        $qte = $fetch['qte'];
                                                        $price = $prix * $qte ;
                                                        ?>
                                                                <tr>
                                                                    <td class="align-middle"><?= $x ?></td>
                                                                    <td class="py-1 align-middle">
                                                                        <?= $assoc['id_commande'] ?> </td>
                                                                        <td class="align-middle"> <?= $fetch['id']; ?> </td>
                                                                    <td class="align-middle"><?= ucfirst($fetch['intitule']) ?></td>
                                                                    <td class="align-middle"><?= number_format($price,0,",",".") ?> FCFA</td>
                                                                    <td class="align-middle"><?= $assoc['dateCommande']; ?></td>
                                                                    <td class="align-middle"><?= $assoc['dateLivraison']; ?></td>
                                                                </tr>
                                                        <?php
                                                                $x++;
                                                            }
                                                            }
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


                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                        <!-- Section Clients -->
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                        <div class="table-responsive p-3">
                                            <table class="table table-striped text-center" id="dataTableHover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Référence</th>
                                                        <th>Image</th>
                                                        <th>Nom du produit</th>
                                                        <th>Prix</th>
                                                        <th>Date de publication</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $check_vente = "SELECT * FROM `produit` LEFT JOIN `statutproduit` ON produit.statutProduit_id = statutproduit.id_statutProduit WHERE `vendeur`= '$id_user'";
                                                    $run_check = mysqli_query($conn, $check_vente);
                                                    if ($run_check) {
                                                        $y = 1;
                                                        while ($fetch = mysqli_fetch_assoc($run_check)) {

                                                    ?>
                                                            <tr>
                                                                <td class="align-middle"><?= $y ?></td>
                                                                <td class="align-middle"><?= $fetch['id'] ?></td>
                                                                <td class="py-1 align-middle">
                                                                    <img src="imageProduits/<?= $fetch['image'] ?>" alt="image" class="img-thumbnail" style="width: 80px;height: 80px;" />
                                                                </td>
                                                                <td class="align-middle"><?= ucfirst($fetch['intitule']) ?></td>
                                                                <td class="align-middle"><?= number_format($fetch['prix'],0,",","."); ?> FCFA</td>
                                                                <td class="align-middle"><?= $fetch['dateCreated']; ?></td>
                                                                <td class="align-middle"><?= $fetch['statutProduit']; ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                        $y++;
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
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end justified tabs  -->
        <!-- ============================================================== -->

</main>
