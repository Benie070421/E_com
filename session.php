<?php
if(isset($_SESSION["id"])){
    $id_session_sauv = $_SESSION["id"];
    $id_user = $_SESSION["id"];
    //Information Etudiant
    $check = "SELECT * FROM user LEFT JOIN panier ON panier.user_id = user.id_user WHERE id_user ='$id_session_sauv' ";
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

}else{
    header('Location: login.php');
}

?>