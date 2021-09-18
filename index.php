<html>
<head>
<link rel="stylesheet" href="style.css">
<!-- Das neueste kompilierte und minimierte CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Das neueste kompilierte und minimierte JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

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
//echo ($pdo);


$stmt1 = $pdo->query("SELECT * from temperature WHERE id = (SELECT MAX(ID) FROM temperature)");
$last_set = $stmt1->fetchAll(PDO::FETCH_ASSOC);

print_r($last_set);
$last_temp = $last_set[0][temp];

$stmt2 = $pdo->query("SELECT * from settings");
$settings = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo"Settings:";
print_r($settings);
echo("<br>");
echo($last_temp);
?>



<h1>TEST</h1>
<p class="temp">Temp:<?php echo($last_temp)?> Celsius</p>
</html>
