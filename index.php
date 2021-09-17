
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
echo ($pdo);
$last_id = $pdo->query("SELECT MAX(ID) FROM temperature");
echo($last_id);

?>



<h1>TEST</h1>
