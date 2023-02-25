<?php
$conn = new PDO("mysql:host=localhost;dbname=projet_medecins", 'root', '');
$rq = $conn->prepare('SELECT id FROM `medecins` WHERE email = "' . $_POST['email'] . '" and MTP="' . crypt($_POST['MTP'], 'blowfish') . '"');

$rq->execute();
if ($data = $rq->fetch()) {
    echo $data[0];
}
else {
    echo -1;
}

?>