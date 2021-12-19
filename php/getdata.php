<?php



// Including Database connection
require_once "pdo.php";
// $pdo = new PDO('mysql:host=localhost;port=8889;dbname=turtle', 'root', 'root');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = 'SELECT `id`, `date`, `temp`, `humidity` from temperature WHERE `id` > 500';


$result = $pdo->query($stmt)->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

print json_encode($data);

?>
