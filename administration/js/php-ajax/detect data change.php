<?php
$conn = new PDO("mysql:host=localhost;dbname=projet_medecins", 'root', '');
// $rq = $conn->prepare("call ".$_POST["proce"] . "(" . $_POST["param"] . ")");
$rq = $conn->prepare($_POST["proce"]);

$rq->execute();
while ($data = $rq->fetch()) {
    echo $data[0];
}

?>