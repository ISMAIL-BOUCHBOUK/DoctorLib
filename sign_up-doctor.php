<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/sign_up-doctor.CSS">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <script>
        let specialites_array = {};
    </script>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'projet_medecins');
    mysqli_query($conn, 'SET NAMES "utf8"');
    ?>
    <div class="bg">
        <div class="header" id="header">

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

        <span class="B-title">Inscrivez-vous</span>
        <div class="main" id="main">
            <form class="needs-validation" method="post" novalidate>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col1">
                        <div class="info-per">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input titre">
                                    <div class="form-floating">
                                        <select class="form-select" id="titre" name="titre">
                                            <option value="0" selected disabled value="">titre</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Pr.">Pr.</option>
                                        </select>
                                        <label class="focused">Titre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input prenom">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                                        <label class="infocused">Prénom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 input nom">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                                        <label class="infocused">Nom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-6 input sexe">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="Homme" value="M" checked>
                                        <label class="form-check-label" for="Homme">
                                            <i class="fa-solid fa-person"></i> Homme
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6 input sexe">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="Femme" value="F">
                                        <label class="form-check-label" for="Femme">
                                            <i class="fa-solid fa-person-dress"></i> Femme
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input email">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email@Email">
                                        <label class="infocused">Email</label>
                                        <div id="em_used" style="display: none;margin-top: 0.25rem;font-size: 0.875em;color: #dc3545;">
                                            l'email est deja utilisé
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input MTP">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="MTP" name="MTP" placeholder="Mot de passe" maxlength="20">
                                        <label class="infocused">Mot de passe</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 input con-MTP">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="con-MTP" name="con-MTP" placeholder="Confirmation du mot de passe" maxlength="20">
                                        <label class="infocused">Confirmation du mot de passe</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-pro">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input specialite">
                                    <div class="form-floating">
                                        <select class="form-select" id="specialite" name="specialite[]">
                                            <option value="0" selected disabled value="">Spécialités</option>
                                            <?php
                                            $data = mysqli_query($conn, "SELECT * FROM specialites");
                                            if ($data->num_rows > 0) {
                                                while ($row = mysqli_fetch_array($data)) {
                                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
                                                    echo '<script>specialites_array["' . $row["id"] . '"]="' . $row["fr"] . '";</script>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label class="focused">Spécialités</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input add-Speciality">
                                    <a id="add-Speciality"> Ajouter une autre spécialité <span>+</span> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input address">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Numéro et rue du cabinet" id="address" name="address"></textarea>
                                        <label class="infocused">Numéro et rue du cabinet</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 input ville">
                                    <div class="form-floating">
                                        <select class="form-select" id="ville" name="ville">
                                            <option value="0" selected disabled value="">Choisissez une ville</option>
                                            <?php
                                            $data = mysqli_query($conn, "SELECT * FROM villes");
                                            if ($data->num_rows > 0) {
                                                while ($row = mysqli_fetch_array($data)) {
                                                    echo ('<option value="' . $row["id"] . '">' . $row["fr"] . '</option>');
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label class="focused">Ville</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 input phone-cabinet">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone-cabinet" name="phone-cabinet" placeholder="Numéro de Téléphone (cabinet)">
                                        <label class="infocused">Numéro de Téléphone (cabinet)</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 input phone-portable">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone-portable" name="phone-portable" placeholder="Numéro de Portable">
                                        <label class="infocused">Numéro de Portable</label>
                                    </div>
                                    <label class="comment">Ne sera utilisé que par notre équipe</label>
                                    <label class="comment">Ne sera pas communiqué aux patients</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 input checkbox">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Je certifie sur l’honneur être un professionnel de santé
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 input submit">
                                    <button class="btn" type="submit" name="submit">Créer un compte</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col2">
                        <div class="row">
                            Pour que votre profil soit visible sur notre site Web
                        </div>
                        <div class="row etape">
                            <div class="num-etape">1</div>
                            <div class="des-etape">Créez votre profil</div>
                        </div>
                        <div class="row etape">
                            <div class="num-etape">2</div>
                            <div class="des-etape">Un membre de l’équipe vous contactera pour confirmer votre compte et compléter votre abonnement.</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>




    </div>





    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="js/sign_up-doctor.js"></script>

    <?php
    if (isset($_POST["submit"])) {
        if ($_POST["sexe"] == "M") {
            $pictur = rand(-5, -1);
        } else {
            $pictur = rand(-10, -6);
        }

        $data = mysqli_query($conn, "CALL `medecin-inscription`('" . $_POST["titre"] . "', '" . $_POST["prenom"] . "', '" . $_POST["nom"] . "', '" . $_POST["sexe"] . "', '" . $_POST["email"] . "', '" . crypt($_POST['MTP'], 'blowfish') . "', '" . $_POST["address"] . "', " . $_POST["ville"] . ", '" . $_POST["phone-cabinet"] . "', '" . $_POST["phone-portable"] . "', " . $pictur . ");");
        $id = mysqli_fetch_array($data)[0];
        $conn->next_result();
        for ($i = 0; $i < count($_POST["specialite"]); $i++) {
            mysqli_query($conn, "CALL `add_dr_spe`(" . $id . ", " . $_POST["specialite"][$i] . ");");
            $conn->next_result();
        }
    }


    $conn->close();
    ?>
</body>

</html>