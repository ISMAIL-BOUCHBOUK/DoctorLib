<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/DR-profil.CSS">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
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
        </div>
    </div>
    <div class="resultat">
        <!-- <div class="info" id="info-gen">
            <div class="title">
                <img src="style/media/icons/icons8-personne-homme-64.png" alt="">
                <span>Informations générales</span>
            </div>
            <div class="img">
                <img class="dr-picture" src="style/media/doctor.png" alt="">
            </div>
            <div class="content">
                <span class="dr-name">
                    <img class="dr-sexe" src="style/media/male.png" alt="">Dr BAYLA Abdelaziz</span><br>
                <label>Adresse principale :</label><br>
                <div class="dr-adresse">
                    boulvard hassan2 Residence ait souss appart 12 - 40000 Agadir
                </div>
                <div class="nationalite">
                    maroc
                </div>
                <label>Téléphone :</label><br>
                <a class="dr-tele" href="">
                    0528841225
                </a><br>
                <label>Fax :</label><br>
                <a class="dr-fax" href="">
                    0528841225
                </a><br>
                <label>Spécialités</label><br>
                <div class="radio-b"></div>
                <a class="spe" href="">
                    Cancérologue
                </a>
            </div>
        </div>

        <div class="info" id="cabinet">
            <div class="title">
                <img src="style/media/icons/icons8-hospital-64.png" alt="">
                <span>Présentation du Cabinet</span>
            </div>
            <p class="content">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione veniam adipisci perspiciatis a laborum iure amet, temporibus quaerat odio asperiores dolores voluptas sint ad, ex delectus aperiam sequi neque quasi.
            </p>
             <div id="carouselExampleIndicators" class="Cabinet-pictures carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url(style/media/p1.jpg)">
                        <img src="style/media/p1.jpg" class="img-fluid">
                    </div>
                    <div class="carousel-item" style="background-image: url(style/media/p2.jpg)">
                        <img src="style/media/p2.jpg" class="img-fluid">
                    </div>
                    <div class="carousel-item" style="background-image: url(style/media/p3.jpg)">
                        <img src="style/media/p3.jpg" class="img-fluid">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>  
        </div>

        <div class="form-lang">
            <div class="info" id="formation">
                <div class="title">
                    <img src="style/media/icons/icons8-diplôme-100.png" alt="">
                    <span>Diplôme et formation</span>
                </div>
                <div class="content">
                    <div class="radio-b"></div>
                    <label class="">
                        Cancérologue
                    </label><br>
                    <div class="radio-b"></div>
                    <label class="">
                        Cancérologue
                    </label><br>
                </div>
            </div>

            <div class="info" id="langues">
                <div class="title">
                    <img src="style/media/icons/icons8-traduction-64.png" alt="">
                    <span> Langues Parlées</span>
                </div>
                <div class="content">
                    <div class="radio-b"></div>
                    <label class="">
                        العربية
                    </label><br>
                    <div class="radio-b"></div>
                    <label class="">
                        Français
                    </label><br>
                    <div class="radio-b"></div>
                    <label class="">
                        English
                    </label><br>
                </div>
            </div>
        </div>

        <div class="info" id="plan">
            <div class="title">
                <img src="style/media/icons/icons8-map-64.png" alt="">
                <span>Plan</span>
            </div>
            <div class="map">
                map
            </div>
        </div>

        <div class="info" id="commentaires">
            <div class="title">
                <img src="style/media/icons/icons8-comment-64.png" alt="">
                <span>commentaires</span>
            </div>

        </div>
    -->
    </div>

    <div class="resultat">
        <?php
        if (!isset($_GET["id"]))
            $_GET["id"] = 0;
        $_GET["id"] = (int)$_GET["id"];
        $data = mysqli_query($conn, "call `(fr)medcin-prof`(" . $_GET['id'] . ")");
        $conn->next_result();
        if ($data->num_rows > 0) {
            $row = mysqli_fetch_array($data);
            $data->close();
            $data = mysqli_query($conn, "SELECT spe_id , fr FROM specialites,dr_spe WHERE dr_spe.dr_id = " . $_GET["id"] . " and dr_spe.spe_id = specialites.id");
            echo '<div class="info" id="info-gen">
            <div class="title">
                <img src="style/media/icons/icons8-personne-homme-64.png" alt="">
                <span>Informations générales</span>
            </div>
            <div class="img">
                <img class="dr-picture" src="' . $row[1] . '" alt="">
            </div>
            <div class="content">
                <span class="dr-name">
                    <img class="dr-sexe" src="' . $row[2] . '" alt="">' . $row[3] . '</span><br>
                <label>Adresse principale :</label><br>
                <div class="dr-adresse">
                ' . nl2br($row[4]) . ' <br> <a class="dr-fax" href="Rechercher%20un%20médecin.php?ville=' . $row[9] . '">' . $row[5] . '</a>
                </div>
                <div class="nationalite">
                    maroc
                </div>';
            if (str_replace(' ', '', $row[6]) != '') {
                echo '<label>Téléphone :</label><br>
                <a class="dr-tele" href="">
                    ' . $row[6] . '
                </a><br>';
            }

            if (str_replace(' ', '', $row[7]) != '') {
                echo '<label>Fax :</label><br>
                <a class="dr-fax" href="">
                    ' . $row[7] . '
                </a><br>';
            }
            if ($data->num_rows > 0) {
                echo '<label>Spécialités</label>';
            }
            while ($row1 = mysqli_fetch_array($data)) {
                echo '<br><div class="radio-b"></div>
                <a class="spe" href="Rechercher%20un%20médecin.php?sp=' . $row1[0] . '">
                    ' . $row1[1] . '
                </a>';
            }

            echo '</div></div>';

            $conn->next_result();
            $data->close();
            $data = mysqli_query($conn, "SELECT url FROM `cab-picturs` WHERE id =" . $row[0]);
            if ($data->num_rows > 0 || str_replace(' ', '', $row[8]) != '') {
                echo '<div class="info" id="cabinet">
                <div class="title">
                    <img src="style/media/icons/icons8-hospital-64.png" alt="">
                    <span>Présentation du Cabinet</span>
                </div>';
                if (str_replace(' ', '', $row[8]) != '')
                    echo '<p class="content">
                    '.nl2br($row[8]).'
                    </p>';
                if ($data->num_rows > 0) {
                    echo '<div id="carouselExampleIndicators" class="Cabinet-pictures carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';

                    for ($i = 1; $i < $data->num_rows; $i++) {
                        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" aria-label="Slide ' . ($i + 1) . '"></button>';
                    }

                    $row1 = mysqli_fetch_array($data);
                    echo '</div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-image: url(' . str_replace('\\', '/', $row1[0]) . ')">
                            <img src="' . $row1[0] . '" class="img-fluid">
                        </div>';

                    while ($row1 = mysqli_fetch_array($data)) {
                        echo '<div class="carousel-item" style="background-image: url(' . str_replace('\\', '/', $row1[0]) . ')">
                        <img src="' . $row1[0] . '" class="img-fluid">
                        </div>';
                    }

                    echo '</div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> ';
                }

                echo '</div>';
            }
            echo '<div class="form-lang">';
            $conn->next_result();
            $data->close();
            $data = mysqli_query($conn, "SELECT `dipl-form` from `dipl-form` WHERE id =" . $row[0]);
            if ($data->num_rows > 0) {
                echo '<div class="info" id="formation">
                <div class="title">
                    <img src="style/media/icons/icons8-diplôme-100.png" alt="">
                    <span>Diplôme et formation</span>
                </div>
                <div class="content">';
                while ($row1 = mysqli_fetch_array($data)) {
                    echo '<div class="radio-b"></div>
                    <label class="">
                        ' . $row1[0] . '
                    </label><br>';
                }
                echo '</div>
                </div>';
            }

            $conn->next_result();
            $data->close();
            $data = mysqli_query($conn, "SELECT lan from `langues-p` WHERE id =" . $row[0]);
            if ($data->num_rows > 0) {
                echo '<div class="info" id="langues">
                <div class="title">
                    <img src="style/media/icons/icons8-traduction-64.png" alt="">
                    <span> Langues Parlées</span>
                </div>
                <div class="content">';
                while ($row1 = mysqli_fetch_array($data)) {
                    echo '<div class="radio-b"></div>
                    <label class="">
                        ' . $row1[0] . '
                    </label><br>';
                }
                echo '</div>
                </div></div>';
            }
            if (str_replace(' ', '', $row[10]) != '') {
                echo '<div class="info" id="plan">
                <div class="title">
                    <img src="style/media/icons/icons8-map-64.png" alt="">
                    <span>Plan</span>
                </div>
                <div class="map" id="map">
                </div>
                </div>';
                echo '<script>posi="' . $row[10] . '".split(",").map(function(val){return parseFloat(val);});let dr_name="' . $row[3] . '"</script>';
            }
        } else {
            echo '<div class="dr"><div class="alert alert-warning" role="alert"> Aucun medecin trouvé ! </div></div>';
        }
        ?>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="js/DR-profil.js"></script>
</body>

</html>