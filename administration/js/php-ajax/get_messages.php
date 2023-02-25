<?php
$conn = new PDO("mysql:host=localhost;dbname=projet_medecins", 'root', '');
$rq = $conn->prepare("CALL `get_messages`(" . $_POST["my_id"] . ",".$_POST["id"].")");

$rq->execute();
while ($data = $rq->fetch()) {
    if($data[0]==$_POST["my_id"]){
        echo '<div class="my_message">
        <span>'.$data[2].'</span>
        </div>';
    }
    else{
        echo '<div class="his_message">
        <span>'.$data[2].'</span>
        </div>';
    }
    
}