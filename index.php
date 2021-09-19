<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//phpinfo();
session_start();

// Including Database connection
require_once "pdo.php";

if (isset($_SESSION['test'])) {
    echo $_SESSION['test'];
}

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

print_r($settings[0][max_temp]);

echo("<br>");
echo"Last Temp:";

echo($last_temp);

// logic for showing temp alert
if ($last_temp > 25) {
    $alert_message = "temp over max level";
    $temp_class = "alert alert-danger";
}
elseif ($last_temp < 15) {
    $alert_message = "temp under min level";
    $temp_class = "alert alert-danger";
}

else {
    $alert_message = "Temp ok!";
    $temp_class = "alert alert-success";
}






?>



<h1>Schildkrötenhaus Dashboard</h1>
<div id="temp" class="<?php echo($temp_class)?>">
    <h4>Temperatur</h2>
    <p >Temp:<?php echo($last_temp)?> Celsius</p>
    <p><?php echo($alert_message)?></p>
    
</div>

<div id ="" class="">
    <h4>Lampenstatus</h4>

</div>

<div id ="" class="">
    <h4>Klappenstatus</h4>

</div>

<div>
    
</div>

</html>
