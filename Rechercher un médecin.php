<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/Rechercher un médecin.CSS">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'projet_medecins');
    mysqli_query($conn, 'SET NAMES "utf8"');
    ?>
    <div class="bg">
        <div class="header">

            <!--start navbar-->
            <nav class="navbar navbar-expand-lg justify-content-lg-center justify-content-end navbar-dark">
                <button class="navbar-toggler search-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-search" aria-controls="offcanvas-search">
                    <img src="style/media/icons/icons8-chercher-150.png" alt="">
                </button>
                <a class="navbar-brand" href="index.php">Lo-Go</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <img src="style/media/icons/icons8-menu-128.png" alt="">
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1">
                            <li class="nav-item"><a href="login.php" class="nav-link"><button class="btn btn-success"><img src="style/media/icons/Picture1.png"> Se connecter</button></a></li>
                            <li class="nav-item"><a href="sign_up.php" class="nav-link"><button class="btn btn-info"> <img src="style/media/icons/icons8-ajouter-un-utilisateur-homme-100.png"> S'inscrire</button></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><button class="btn btn-info"><img src="style/media/icons/Picture2.png"> عربي</button></a></li>
                        </ul>
                    </div>
                </div>

            </nav>

            <!--end navbar-->

            <center>
                <nav class="navbar navbar-expand-lg justify-content-lg-center justify-content-end navbar-dark navbar-searche">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-search" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close btn-close-dark " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="search-box">
                                <form method="GET" action="Rechercher un médecin.php">
                                    <select name="sp" id="sp">
                                        <option value="0" selected>Spécialité</option>
                                        <?php
                                        if (!isset($_GET["sp"]) || empty($_GET["sp"]))
                                            $_GET["sp"] = 0;
                                        if (!isset($_GET["ville"]) || empty($_GET["ville"]))
                                            $_GET["ville"] = 0;
                                        if (!isset($_GET["nom"]) || empty($_GET["nom"]))
                                            $_GET["nom"] = "";
                                        if (!isset($_GET["prenom"]) || empty($_GET["prenom"]))
                                            $_GET["prenom"] = "";
                                        if (!isset($_GET["code-postal"]) || empty($_GET["code-postal"]))
                                            $_GET["code-postal"] = "";

                                        $_GET["page"] = (int)$_GET["page"];
                                                                                
                                        // if (!isset($_GET["page"]) || empty($_GET["page"])) {
                                        //     $_GET["page"] = 1;
                                        // }

                                        $data = mysqli_query($conn, "SELECT * FROM specialites");
                                        if ($data->num_rows > 0) {
                                            while ($row = mysqli_fetch_array($data)) {
                                                if ($_GET["sp"] == $row["id"]) {
                                                    echo ('<option value="' . $row["id"] . '" selected >' . $row["fr"] . '</option>');
                                                } else {
                                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="ville" id="ville">
                                        <option value="0" selected>Ville</option>
                                        <?php
                                        $data = mysqli_query($conn, "SELECT * FROM villes");
                                        if ($data->num_rows > 0) {
                                            while ($row = mysqli_fetch_array($data)) {
                                                if ($_GET["ville"] == $row["id"]) {
                                                    echo ('<option value="' . $row["id"] . '" selected >' . $row["fr"] . '</option>');
                                                } else {
                                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i> Rechercher</button>
                                    <input value="<?php echo $_GET["nom"] ?>" type="text" name="nom" id="nom" class="search-avan" placeholder="Nom">
                                    <input value="<?php echo $_GET["prenom"] ?>" type="text" name="prenom" id="prenom" class="search-avan" placeholder="Prénom">
                                    <input value="<?php echo $_GET["code-postal"] ?>" type="text" name="code-postal" id="code-postal" class="search-avan" placeholder="Code postal">
                                </form>
                            </div>
                        </div>
                    </div>

                </nav>
            </center>


        </div>
    </div>
    <div class="resultat">

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

        if($_GET["page"]<1){
            $_GET["page"] =1;
        }
        if($_GET["page"]>$pages_count){
            $_GET["page"] =$pages_count;
        }

        $data->close();
        $conn->next_result();



        $data = mysqli_query($conn, "call `(fr)rechercher_medecins`(" . $_GET["sp"] . "," . $_GET["ville"] . ",'" . $_GET["nom"] . "','" . $_GET["prenom"] . "'," . $_GET["code-postal"] . "," . ($_GET["page"] - 1) * $rang . "," . $rang . ")");
        if ($data->num_rows > 0) {
            while ($row = mysqli_fetch_array($data)) {
                echo '<div class="dr">
                    <div class="dr-p1">
                        <a href="DR-profil.php?id=' . $row[0] . '"><img src="' . $row[7] . '" class="dr-picture"></a>
                        <div class="dr-sp">
                            ' . $row[1] . '
                        </div>
                        <a href="DR-profil.php?id=' . $row[0] . '" class="dr-name">
                            ' . $row[2] . '
                        </a>
                        <div class="dr-adresse">
                            ' . nl2br($row[3]) . ' - ' . $row[4] . '
                        </div>
                    </div>
                    <div class="dr-p2">
                        <img src="' . $row[5] . '" class="dr-sexe">
                        <a class="dr-tele">Tél.:' . $row[6] . '</a>
                        <a href="DR-profil.php?id=' . $row[0] . '" class="dr-voir-profil"> Voir profil </a>
                    </div>
                </div>';
            }
        } else {
            echo'<div class="dr"><div class="alert alert-warning" role="alert"> Aucun medecin trouvé ! </div></div>';
        }
        $data->close();
        $conn->next_result();
        ?>
        <nav aria-label="...">
            <ul class="pagination">
                <?php
                if (1 < $_GET["page"] && $_GET["page"] <= $pages_count) $act_dis = "";
                else $act_dis = " disabled";

                echo '<li class="page-item' . $act_dis . '">
                <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . ($_GET['page'] - 1) . '">Previous</a>
                </li>';

                if (1 <= $_GET["page"] && $_GET["page"] <= $pages_count) {
                    if ($_GET['page'] - 1 > 6) {
                        for ($i = 1; $i <= 3; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                        echo '<li class="page-item">
                        <a class="page-link">...</a>
                        </li>';
                        for ($i = $_GET["page"] - 2; $i < $_GET["page"]; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    } else {
                        for ($i = 1; $i < $_GET["page"]; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    }

                    echo '<li class="page-item active" aria-current="page">
                    <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $_GET["page"] . '">' . $i . '</a>
                    </li>';

                    if ($pages_count - $_GET['page'] > 6) {
                        for ($i = $_GET["page"] + 1; $i <= $_GET["page"] + 2; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                        echo '<li class="page-item">
                        <a class="page-link" >...</a>
                        </li>';
                        for ($i = $pages_count - 2; $i <= $pages_count; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    } else {
                        for ($i = $_GET["page"] + 1; $i <= $pages_count; $i++) {
                            echo '<li class="page-item" aria-current="page">
                            <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    }
                }



                // for ($i = 1; $i <= $pages_count; $i++) {
                //     if ($i != $_GET["page"]) $act_dis = "";
                //     else $act_dis = " active";

                //     echo '<li class="page-item ' . $act_dis . '" aria-current="page">
                //     <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . $i . '">' . $i . '</a>
                //     </li>';
                // }

                if (1 <= $_GET["page"] && $_GET["page"] < $pages_count) $act_dis = "";
                else $act_dis = " disabled";

                echo '<li class="page-item' . $act_dis . '">
                <a class="page-link" href="?sp=' . $_GET['sp'] . '&ville=' . $_GET['ville'] . '&nom=' . $_GET['nom'] . '&prenom=' . $_GET['prenom'] . '&code-postal=' . $_GET['code-postal'] . '&page=' . ($_GET['page'] + 1) . '">Next</a>
                </li>';
                ?>
            </ul>
        </nav>
    </div>



    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="js/Rechercher un médecin.js"></script>
    <?php
    $conn->close();
    ?>
</body>

</html>