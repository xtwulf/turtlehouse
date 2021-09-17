
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//phpinfo();


session_start();



echo ("Test");
// Including Database connection
require_once "pdo.php";

/*
if (isset($_SESSION['test'])) {
    echo $_SESSION['test'];
}
*/

// Query for displaying data
//$stmt = $pdo->query("SELECT first_name, last_name, headline, user_id, profile_id FROM Profile");
//$elements = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo ($pdo);


$stmt = $pdo->query("SELECT * from temperature WHERE id = (SELECT MAX(ID) FROM temperature)");
$last_set = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($last_set);
$last_temp = $last_set[0][temp];



echo($last_temp);
?>



<h1>TEST</h1>
