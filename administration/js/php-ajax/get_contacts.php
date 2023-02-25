<?php
$conn = new PDO("mysql:host=localhost;dbname=projet_medecins", 'root', '');
$rq = $conn->prepare("call get_contacts(" . $_POST["id"] . ",'".$_POST["name"]."')");

$rq->execute();
while ($data = $rq->fetch()) {
    echo '<div class="dr';
    if ($data[0]==$_POST["selected"]){
        echo ' active';
    }
    echo '" code="'.$data[0].'">
    <img class="picture" src="..\\..\\' . $data[1] . '" alt="">
                <div class="na_me">
                    <h3 class="name">' . $data[2] . '</h3>
                    <p class="message">' . $data[3] . '</p>
                </div>';
    if ($data[4] > 0 && $data[0]!=$_POST["selected"])
        echo '<div class="count">' . $data[4] . '</div>';
    echo '</div>';
}

echo '<div class="global">
            <h3>résultats de la recherche globale</h3>
            </div>';

$rq = $conn->prepare("call get_global_contacts(" . $_POST["id"] . ",'".$_POST["name"]."')");
$rq->execute();
while ($data = $rq->fetch()) {
    echo '<div class="dr';
    if ($data[0]==$_POST["selected"]){
        echo ' active';
    }
    echo '" code="'.$data[0].'">
                <img class="picture" src="..\\..\\' . $data[1] . '" alt="">
                <div class="na_me">
                    <h3 class="name">' . $data[2] . '</h3>
                </div>
                </div>';
}
