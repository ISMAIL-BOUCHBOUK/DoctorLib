<?php
        if (!isset($_GET["code-postal"]) || empty($_GET["code-postal"]))
            $_GET["code-postal"] = 0;
        $rang = 3;
        $med_count = mysqli_fetch_array(mysqli_query($conn, "call `(fr)rechercher_medecins_count`(" . $_GET["sp"] . "," . $_GET["ville"] . ",'" . $_GET["nom"] . "','" . $_GET["prenom"] . "'," . $_GET["code-postal"] . ")"))[0];

        if ($med_count == 0) {
            $pages_count = 1;
        } else if ($med_count % $rang != 0) {
            $pages_count = intdiv($med_count, $rang) + 1;
        } else {
            $pages_count = intdiv($med_count, $rang);
        }

        $data->close();
        $conn->next_result();



        $data = mysqli_query($conn, "call `(fr)rechercher_medecins`(" . $_GET["sp"] . "," . $_GET["ville"] . ",'" . $_GET["nom"] . "','" . $_GET["prenom"] . "'," . $_GET["code-postal"] . "," . ($_GET["page"] - 1) * $rang . "," . $rang . ")");
        if ($data->num_rows > 0) {
            while ($row = mysqli_fetch_array($data)) {
                echo '<div class="dr">
                    <div class="dr-p1">
                        <a href=""><img src="' . $row[7] . '" class="dr-picture"></a>
                        <div class="dr-sp">
                            ' . $row[1] . '
                        </div>
                        <a href="" class="dr-name">
                            ' . $row[2] . '
                        </a>
                        <div class="dr-adresse">
                            ' . $row[3] . ' - ' . $row[4] . '
                        </div>
                    </div>
                    <div class="dr-p2">
                        <img src="' . $row[5] . '" class="dr-sexe">
                        <a class="dr-tele">Tél.:' . $row[6] . '</a>
                        <a href="DR-profil.php?id=' . $row[0] . '" class="dr-voir-profil"> Voir profil </a>
                    </div>
                </div>';
            }
        }
        $data->close();
        $conn->next_result();
        ?>