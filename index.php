<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
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
                <span class="B-title">TROUVER UN BON MÉDECIN</span>
                <span class="S-title">Recherchez un médecin parmi nos médecins et spécialistes et faites le bon
                    choix</span>
                <div class="search-box">
                    <form method="GET" action="Rechercher un médecin.php">
                        <select name="sp" id="sp">
                            <option value="0" selected>Spécialité</option>
                            <?php
                            $data = mysqli_query($conn, "SELECT * FROM specialites");
                            if ($data->num_rows > 0) {
                                while ($row = mysqli_fetch_array($data)) {
                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
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
                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
                                }
                            }
                            ?>
                        </select>
                        <!-- <input type="submit" name="search" id="search" value="🔍 Rechercher"> -->
                        <!-- <button type="submit" name="search" id="search"><img src="style/media/icons/icons8-chercher-208.png" alt=""> Rechercher</button> -->
                        <button type="submit" name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i> Rechercher</button>

                        <div id="advanced-search">
                            <input type="text" name="nom" id="nom" class="search-avan" placeholder="Nom">
                            <input type="text" name="prenom" id="prenom" class="search-avan" placeholder="Prénom">
                            <input type="text" name="code-postal" id="code-postal" class="search-avan" placeholder="Code postal">
                        </div>

                    </form>
                    <div class="s-type">
                        <div id="R-simple" class="active">Recherche simple</div>
                        <button id="R-avancee">Recherche avancée</button>
                        <input type="checkbox" hidden>
                    </div>
                </div>
            </center>


        </div>
    </div>
    <div class="main">
        <span class="B-title">LE BON CHOIX POUR UN MEILLEUR SOIN</span>
        <span class="S-title">notre site vous aide à choisir en mettant à votre service une importante base de données
            de médecins avec les recommandations de leurs patients</span>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>




    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="js/index.js"></script>
    <?php
    $conn->close();
    ?>
</body>

</html>