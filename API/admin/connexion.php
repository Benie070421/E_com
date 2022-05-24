<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$servername = "localhost";
$username = "u225872299_ecorecycleplus";
$password = "Ecorecyclesplus19";
$dbname = "u225872299_ecorecycleplus";
$date_poste = date("Y/m/d");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connexion a echoue: " .mysqli_connect_error());
} else {
}

function dbQuery($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	return $result;
}

function dbFetchAssoc($result) {
	return mysqli_fetch_assoc($result);
}

function dbNumRows($result) {
    return mysqli_num_rows($result);
}

function closeConn() {
	global $conn;
	mysqli_close($conn);
}

?>
