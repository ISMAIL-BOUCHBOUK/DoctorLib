<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=projet_medecins", 'root', '');
$rq = $conn->prepare("CALL `send_message`(".$_SESSION["id"].", ".$_POST["re"].", '".$_POST["mes"]."');");
$rq->execute();
?>