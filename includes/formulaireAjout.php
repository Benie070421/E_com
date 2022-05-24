<?php
$errors = array();
$intitule = "";
$categorie = "";
$prix = "";
$quantité = "1";
$description = "";
//Enregistrement
if (isset($_POST['save'])) {
    $intitule = mysqli_escape_string($conn,strtolower(addslashes(trim($_POST['intitule']," "))));
    $categorie = mysqli_escape_string($conn,addslashes($_POST['type']));
    $prix = mysqli_escape_string($conn,addslashes($_POST['prix']));
    $quantité = mysqli_escape_string($conn,addslashes($_POST['quantité']));
    $description = mysqli_escape_string($conn,strtolower(addslashes(trim($_POST['description']," "))));
    $datetime = date("Y-m-d") ;


    // Téléchargement de l'image de profil de l'utilisateur sur le serveur
    $file = $_FILES['image'];
    if ($file['size'] > 0) {
        $dir = "imageProduits/";
        if (!isset($file['name']) || empty($file['name'])) {
            $errors['image'] = "Vous devez indiquer une image !";
        }

        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $nomImage = $random . "_" . $file['name'];
        $target_file = $dir . $nomImage;

        if (!getimagesize($file["tmp_name"]))
            $errors['image'] = "Le fichier n'est pas une image !";
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            $errors['image'] = "L'extension du fichier n'est pas reconnu !";
        if (file_exists($target_file))
            $errors['image'] = "Le fichier existe déjà !";
        if ($file['size'] > 500000)
            $errors['image'] = "Le fichier est trop gros !";
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            $errors['image'] = "Désolé mais L'ajout de l'image n'a pas fonctionné !";
    } else {
        $errors['image'] = "Aucune photo du produit n'a été sélectionné";
    }

    if (count($errors) == 0) {
        // Ajout du produit dans la base de données
        $sql = "INSERT INTO `produit` (`intitule`,`categorie`,`prix`,`quantite`,`description`,`image`,`vendeur`,`statutProduit_id`,`dateCreated`) VALUES('$intitule','$categorie','$prix','$quantité','$description','$nomImage','$id_user','2','$datetime')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["info"] = "Votre produit a été enregistré avec succes! ";
            header('Location:lndex.php');
        } else {
            $errors['req'] = $sql . "<br>" . mysqli_error($conn);
        }
    }
}
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
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingNom" placeholder="Nom du produit" name="intitule" value="<?= $intitule; ?>" required>
    </div>
    <div class="form-floating mb-3">
        <!-- <label for="categorieProduct">Catégorie</label> -->
        <select class="form-control" id="categorieProduct" name="type" required>
            <option selected>Sélectionner une catégorie de produit</option>
            <?php
            $check_categorie = "SELECT * FROM categorieproduit";
            $run_check_cat = mysqli_query($conn, $check_categorie);
            if ($run_check_cat) {
                while ($row = mysqli_fetch_assoc($run_check_cat)) {
            ?>
                    <option value="<?= $row['id_categorie'] ?>"><?= $row['category_name'] ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingPrix" placeholder="Prix du produit" name="prix" value="<?= $prix; ?>" required>
    </div>
    <div class="form-floating mt-3 mb-3">
        <input type="number" class="form-control" id="floatingQte" placeholder="Quantité" name="quantité" value="<?= $quantité; ?>">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="floatingDesc" placeholder="Description" name="description"> <?= $description ?></textarea>

    </div>
    <div class="mb-3">

        <input type="file" class="form-control" id="photo" placeholder="Ajouter une photo" name="image" value="<?= $file ?>" required>
    </div>
    <input type="submit" class="btn-success" name="save" value="Ajouter" />
</form>
<?php
