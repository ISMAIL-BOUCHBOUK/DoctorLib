<?php

// use function PHPSTORM_META\type;

// foreach ($_POST as $key => $val){
//     if (gettype($val) == 'array'){
//         echo $key.'=><br>';
//         for($i=0;$i< count($val);$i++){
//             echo $val[$i].'<br>';
//         }
//     }
//     else{
//         echo $key.'=>'.$val.'<br>';
//     }
// }
$conn = new mysqli('localhost', 'root', '', 'projet_medecins');
mysqli_query($conn, 'SET NAMES "utf8"');

if ($_POST["sexe"] == "M") {
    $pictur = rand(-5, -1);
} else {
    $pictur = rand(-10, -6);
}
$data = mysqli_query($conn, "CALL `medecin-inscription`('" . $_POST["titre"] . "', '" . $_POST["prenom"] . "', '" . $_POST["nom"] . "', '" . $_POST["sexe"] . "', '" . $_POST["email"] . "', '" . $_POST["MTP"] . "', '" . $_POST["address"] . "', " . $_POST["ville"] . ", '" . $_POST["phone-cabinet"] . "', '" . $_POST["phone-portable"] . "', " . $pictur . ");");
$id = mysqli_fetch_array($data)[0];
echo $id;
$conn->next_result();
for ($i = 0; $i < count($_POST["specialite"]); $i++) {
    mysqli_query($conn, "CALL `add_dr_spe`(" . $id . ", " . $_POST["specialite"][$i] . ");");
    $conn->next_result();
    echo $_POST["specialite"][$i];
}
