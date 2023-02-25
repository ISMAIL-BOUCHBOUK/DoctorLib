<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/login.CSS">
</head>

<body>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
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

        <span class="B-title">Connectez-vous à votre compte</span>
        <div class="main" id="main">
            <form id="form" method="post" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-12 input email">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email@Email">
                            <label class="infocused">Email</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 input MTP">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="MTP" name="MTP" placeholder="Mot de passe">
                            <label class="infocused">Mot de passe</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 input submit">
                        <div id="em_used" style="display: none;float: left;margin-top: 0.25rem;font-size: 17px;color: #dc3545;padding-left: 14px;">
                            l'email ou le mot de passe est incorrect
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 input submit">
                        <button class="btn" type="submit" name="submit">Connexion</button>
                    </div>
                </div>
                <!-- <div class="row">
                    <span class="MTP-oublie">mot de passe oublié ?</span>
                </div> -->
            </form>


            <?php
            // if (isset($_POST['submit'])) {
            //     $conn = new mysqli('localhost', 'root', '', 'projet_medecins');
            //     $r = 'SELECT id FROM `medecins` WHERE email = "' . $_POST['email'] . '" and MTP="' . crypt($_POST['MTP'], 'blowfish') . '"';
            //     $d = mysqli_query($conn, $r);
            //     if ($data = mysqli_fetch_array($d)) {
            //         $_post['id'] = $data[0]; //$data['id_u'];
            //         header('location: administration\administration.php');
            //     } else {
            //         echo '<script>
            //             $("#em_used").show();
            //         </script>';
            //     };
            // }

            ?>
        </div>
    </div>
    <script src="js\loginjs.js"></script>


</body>

</html>