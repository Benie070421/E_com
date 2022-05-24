<?php
ob_start();
require_once 'session.php';
$errors=array();


?>
<style>
    .row {
        background-color: rgba(117, 224, 135, 0.329);
    }

    .cursor {
        cursor: pointer;
    }

    .btn:focus {
        box-shadow: none;
    }

    .list-group-item {
        padding: 0;
        background: bottom;
    }

    .list-group-item a {
        color: white;
    }

    .list-group-item:hover .nav-link {
        color: rgb(3, 8, 71);
    }

    .menu-title {
        color: white;
    }

    .border-0 {
        background-color: rgb(5, 71, 3);
    }

    .card2 {
        background-color: rgb(3, 8, 71);
    }

    a {
        outline: none;
        text-decoration: none !important;
        padding: 2px 1px 0;
        color: black;
    }
</style>
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
<div class="container-fluid light-style flex-grow-1 container-p-y-4 p-0">

    <h1 class=" display-3 text-center font-weight-bold py-2 text-warning">
        Paramètre du compte <span class="text-1100"> de l'utilisateur</span>
    </h1>

    <div class="card overflow-hidden" style="border-radius: 0;">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general"><strong>General</strong></a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Changement du mot de passe</a>
                    <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a> -->
                    <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="card-body media align-items-center text-center">
                                <h1 class="display-6" style="display:contents">Votre photo de profil : &nbsp &nbsp</h1>
                                <img src="imagesUser/<?= $image ?>" height=100px alt="" class="ui-w-80">
                                <div class="media-body mt-4">
                                    <label class="btn btn-outline-primary">
                                        Télécharger une nouvelle photo de profil
                                        <input type="file" class="account-settings-fileinput" name="image">
                                    </label> &nbsp;
                                    <!-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> -->

                                    <div class="text-black small mt-1">Recommander JPG, GIF et PNG. Taille maximale 800K</div>
                                </div>
                                <br>
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn-primary" type="submit" name="change_image" value="Changer l'image">
                            </div>
                        </form>
                        <hr class="border-info border-top mt-4">
                        <div class="card-body">
                            <form action="" method="POST" autocomplete="off">
                                <div class="form-group">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" class="form-control mb-1" value="<?= ucfirst($prenom) ?>" name="prenomAdminConnect">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" value="<?= ucfirst($nom) ?>" name="nomAdminConnect">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?= $email ?>" name="emailAdminConnect">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact</label>
                                    <input type="text" class="form-control" value="<?= $contact ?>" name="contactAdminConnect">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Localité</label>
                                    <input type="text" class="form-control" value="<?= ucfirst($localité) ?>" name="localiteAdminConnect">
                                </div>
                                <div class="form-group mt-3">
                                    <input class="btn btn-danger" type="submit" name="change_info" value="Changer les informations">
                                </div>
                        </div>
                        </form>
                        <hr class="border-light m-0">
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <form action="" method="POST" autocomplete="off">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Mot de passe actuel</label>
                                    <input type="password" class="form-control" name="ancMdp">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="newMdp">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirmer mot de passe</label>
                                    <input type="password" class="form-control" name="confirmNewMdp">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="change_password" value="Changer le mot de passe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// Modification des informations personnelles de l'utilisateur!
// lorsque l'utilisateur clique sur le button change_info
if (isset($_POST['change_info'])) {
    $_SESSION['info'] = "";
    $prenom = mysqli_real_escape_string($conn, strtolower(trim($_POST['prenomAdminConnect']," ")));
    $nom = mysqli_real_escape_string($conn, strtolower(trim($_POST['nomAdminConnect']," ")));
    $email = mysqli_real_escape_string($conn, strtolower(trim($_POST['emailAdminConnect']," ")));
    $contact = mysqli_real_escape_string($conn, trim($_POST['contactAdminConnect']," "));
    $localite = mysqli_real_escape_string($conn, trim(strtolower($_POST['localiteAdminConnect']," ")));
    $update_pass = "UPDATE `user` SET `nom`='$nom', `prenom`='$prenom', `email`='$email', `contact`='$contact', `localite`='$localite' WHERE id_user = '$id_user'";
    $run_query = mysqli_query($conn, $update_pass);
    if ($run_query) {
        $info = "Vos informations ont été changé avec succes !";
        $_SESSION['info'] = $info;
        header('Location: setting.php');
    } else {
        $errors['db-error'] = "Échec lors de la modification de vos informations !";
    }
}
// Modification des informations personnelles de l'administrateur!
// lorsque l'utilisateur clique sur le button change_password
if (isset($_POST['change_password'])) {
    $_SESSION['info'] = "";
    $ancMdp = mysqli_real_escape_string($conn, trim($_POST['ancMdp']," "));
    $password = mysqli_real_escape_string($conn, trim($_POST['newMdp']," "));
    $cpassword = mysqli_real_escape_string($conn, trim($_POST['confirmNewMdp']," "));
    if (password_verify($ancMdp, $mdpAdminConnect)) {
        if ($password !== $cpassword) {
            $_SESSION['info'] = "Les mots de passe renseignés ne correspondent pas !";
            header('Location: EditSetting.php');
        } else {
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE `user` SET `password`='$encpass' WHERE email = '$emailAdminConnect' AND password = '$ancMdp' ";
            $run_query = mysqli_query($conn, $update_pass);
            if ($run_query) {
                $info = "Votre mot de passe a été changé avec succes !";
                $_SESSION['info'] = $info;
                header('Location: setting.php');
            } else {
                $_SESSION['info'] = "Échec lors de la modification de votre mot de passe !";
            }
        }
    } else {
        $info = "L'ancien mot de passe inséré est incorrect, veuillez recommencez !";
        $_SESSION['info'] = $info;
        header('Location: EditSetting.php');
    }
}
// Modification de l'image de l'Administrateur
if (isset($_POST['change_image'])) {
    $imageActuelle = "imagesUser/" . $image;
    $file = $_FILES['image'];
    if ($file['size'] > 0) {
        $dir = "imagesUser/";
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image !");

        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image !");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu !");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà !");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros !");
        if (!move_uploaded_file($file['tmp_name'], $target_file)) {
            throw new Exception("L'ajout de l'image n'a pas fonctionné !");
        } else {
            $imageUser = $random . "_" . $file['name'];
            $nomImageToAdd = $imageUser;
            $update_image = "UPDATE `user` SET  `image_user`='$nomImageToAdd' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_image);
            if ($run_query) {
                $info = "Votre photo de profil a été changé avec succes !";
                unlink($imageActuelle);
                $_SESSION['info'] = $info;
                header('Location: EditSetting.php');
            } else {
                $errors['db-error'] = "Échec lors de la modification de votre photo de profil !";
            }
        }
    } else {
        $_SESSION['info'] = "Aucune image sélectionnée !";
    }
}


?>