<?php



// Including Database connection
require_once "pdo.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = 'SELECT date, temp FROM temperature';


$result = $pdo->query($stmt)->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

print json_encode($data);

?>
