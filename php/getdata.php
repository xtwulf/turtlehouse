<?php



// Including Database connection
require_once "pdo.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = 'SELECT temp FROM temperature';


$result = $pdo->query($stmt)->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
print_r($data);
print json_encode($data);

?>