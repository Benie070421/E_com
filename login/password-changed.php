<?php
ob_start();
require_once "controllerUserData.php"; ?>
<?php
if ($_SESSION['info'] == false) {
    header('Location: ../login.php');
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form login-form">
            <?php
            if (isset($_SESSION['info'])) {
            ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                </div>
            <?php
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <input class="form-control button" type="submit" name="login-now" value="Se connecter maintenant">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
$title = "Mot de passe changé! - ECO_RECYCLE +";

$content = ob_get_clean();
require_once "../template.php";
?>