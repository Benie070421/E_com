<?php 
// session_start();
require_once "../API/database/connexion.php";
$name = "";
$prenom = "";
$email = "";
$genre = "";
$localite = "";
$contact = "";
$password = "";
$errors = array();


    //if user click continue button in forgot password form
    if(isset($_POST["check-email"])){
        $email = mysqli_real_escape_string($conn, addslashes(trim($_POST['email']," ")));
        $check_email = "SELECT * FROM `user` WHERE `email`='$email' " ;
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE `user` SET `token`='$code' WHERE `email`='$email' ";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "Code de rénitialisation de mot de passe";
                $message = "Le code de réinitialisation de votre mot de passe est $code";
                $sender = "From: ecorecycle@gmail.com";
                print_r(ini_set(0,25));
                if((mail($email, $subject, $message, $sender))){
                    $info = "Nous avons envoyé un code de réinitialisation de mot de passe à votre adresse e-mail - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Échec lors de l'envoi du code de rénitialisation! Veuillez nous contactez si le problème persiste !";
                }
            }else{
                $errors['db-error'] = "Oups! Quelque chose s'est mal passé lors de la tentative de générer un code re rénitialisation! Veuillez nous contactez si le problème persiste !";
            }
        }else{
            $errors['email'] = "Cette adresse e-mail n'est liée à aucun compte d'utilisateur!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        // $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, addslashes(trim($_POST['otp']," ")));
        $check_code = "SELECT * FROM `user` WHERE `token` = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Veuillez créer un nouveau mot de passe.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "Vous avez entré un code incorrect!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        // $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, md5(addslashes(trim($_POST['password']," "))));
        $cpassword = mysqli_real_escape_string($conn, md5(addslashes(trim($_POST['cpassword']," "))));
        if($password !== $cpassword){
            $errors['password'] = "Les mots de passe renseignés ne correspondent pas!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = (password_hash($password, PASSWORD_BCRYPT));
            $update_pass = "UPDATE `user` SET `password`='$encpass',`token`='$code' WHERE `email` = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Votre mot de passe a été changé avec succès ! Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Échec lors de la modification de votre mot de passe!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: ../login.php');
    }
?>