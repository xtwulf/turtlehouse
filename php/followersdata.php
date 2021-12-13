<?php
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=turtle', 
   'root', 'root');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = 'SELECT userid, facebook, twitter, googleplus FROM followers';


$result = $pdo->query($stmt)->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

print json_encode($data);

?>