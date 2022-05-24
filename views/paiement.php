<?php
$montant = $_GET["montant"];
?>
<?php
if (isset($_POST['valider'])) { //Script de passation de commande
    $montant = $_POST["montant"];
    $id_user = $_POST["id_user"];
    $panier_id = $_POST['panier_id'];
    // $date = date("d-F-Y");
    $datetime = date("Y-m-d");

    //Création de la commande dans la table cart destinée aux commandes
    $create_commande = " INSERT INTO `cart`(`panier_id`,`montantHT`,`client`,`dateCommande`) VALUES ('$panier_id','$montant','$id_user','$datetime') ";
    $data_create = mysqli_query($conn, $create_commande);
    if ($data_create) {
        //   Modification de l'état du panier
        // 0 pour panier non commandé et 1 pour panier commandé
        $update_etatPanier = "UPDATE `panier` SET `etatPanier`='1' WHERE `id_panier`='$panier_id' AND `user_id`='$id_user'";
        ;
        $run_update_etatPanier =  mysqli_query($conn, $update_etatPanier);
        if ($run_update_etatPanier) {
            // Mise à jour de la quantité restante du produit
            // Sélection des articles du panier
            $prod_check = "SELECT * FROM `article` LEFT JOIN produit ON produit.id = article.produit WHERE `panier` = '$panier_id' ";
            $prod_res = mysqli_query($conn, $prod_check);
            $num = mysqli_num_rows($prod_res);
            for ($a = 0; $a <= $num; $a++) {
                $fetch_article = mysqli_fetch_assoc($prod_res);
                $idProduit = $fetch_article['id'];
                $qteCommandé = $fetch_article['qte'];
                $stock = $fetch_article['qteFinal'];
                $new_qte = intval($stock) - intval($qteCommandé);
                // Mise à jour du stock de produit
                $update_qte = "UPDATE `produit` SET `qteFinal`='$new_qte' WHERE `id`='$idProduit' ";
                $run_update_qte =  mysqli_query($conn, $update_qte);
                if ($run_update_qte) {
                    $_SESSION['info'] = [
                        "type" => "success",
                        "msg" => "La quantité du produit a été mise à jour avec succès !",
                    ];
                } else {
                    $_SESSION['info'] = [
                        "type" => "danger",
                        "msg" => "Echec de la mise à jour de la quantité du produit !",
                    ];
                }
            }
            $_SESSION['info'] = [
                "type" => "success",
                "msg" => "L'état du panier a été mis à jour avec succès !",
            ];
        } else {
            $_SESSION['info'] = [
                "type" => "danger",
                "msg" => "Echec de la mise à jour de l'état du panier !",
            ];
        }
        $_SESSION['info'] = [
            "type" => "success",
            "msg" => "Super !La commande a été passée avec succès !",
        ];
        // Sélection de l'identifiant de la commande
        $com_check = "SELECT * FROM `cart` WHERE `panier_id` = '$panier_id' ";
            $com_res = mysqli_query($conn, $com_check);
            $fetch_com = mysqli_fetch_assoc($com_res);
            $id_com = $fetch_com['id_commande'];
            $_SESSION['id_com'] = $id_com ;
        header("location: buy_ok.php");
    } else {
        $_SESSION['info'] = [
            "type" => "danger",
            "msg" => "Echec lors de l'enregistrement de la commande ! Veuillez contactez les administrateurs si le problème persiste !",
        ];
    }
}
?>

<?php
if (!empty($_SESSION['info'])) {
?>
    <div class="col-12  mb-5" id="alert">
        <div class="alert alert-<?= $_SESSION['info']['type'] ?> alert-dismissible  mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="pointer-events:none;">&times;</span>
            </button>
            <?= $_SESSION['info']['msg']; ?>
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
<section class="pt-2">
    <div class="container-xxl">
        <div class="row justify-content-center">
            <!-- paiement bancaire -->
            <div class="col-xs-12 col-md-4 col-sm-8 col-md-offset-4 p-4 mt-3" style="background:#39923f; color:gold; border: 2px solid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row justify-content-center">
                            <h3 class="text-center">Paiement Mobile</h3>
                            <img class="img-responsive cc-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTrdoGMws092NpQNDmEFchxFUpjHspW8E3dw&usqp=CAU" style="width:60%">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Entrez votre nom" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Entrez votre numero de telephone" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Code de paiement</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Entrez le code de paiement" />

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12 text-center m-3">
                                <form method="post" action="">
                                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                    <input type="hidden" name="montant" value="<?= $montant; ?>">
                                    <input type="hidden" name="panier_id" value="<?= $panier ?>">
                                    <button type="submit" name="valider" class="btn btn-warning btn-lg btn-block">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- paiement mobile -->
            <div class="col-xs-12 col-md-4 col-sm-8 col-md-offset-4 p-4 mt-3" style="background:#39923f; color:gold; border: 2px solid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row justify-content-center">
                            <h3 class="text-center">Paiement bancaire</h3>
                            <img class="img-responsive cc-img" src="assets/imgBuy/visa.png" style="width:25%">
                            <img class="img-responsive cc-img" src="assets/imgBuy/mastercard.png" style="width:25%">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Numero de carte</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Entrez un numero de carte valide" />
                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Date d'expiration</span></label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>Code CV</label>
                                        <input type="tel" class="form-control" placeholder="CVC" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Titulaire de la carte</label>
                                        <input type="text" class="form-control" placeholder="Entrez le nom du titulaire de la carte" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12 text-center m-3">
                                <a href="validationpaiement.php" class="btn btn-warning btn-lg btn-block">Valider</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>