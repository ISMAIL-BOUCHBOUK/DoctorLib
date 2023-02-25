<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/sign_up-user.CSS">
</head>

<body>
    <div class="bg">
        <div class="header" id="header">

            <!--start navbar-->
            <nav class="navbar navbar-expand-lg justify-content-lg-center justify-content-end navbar-dark">
                <a class="navbar-brand" href="index.php">Lo-Go</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <img src="style/media/icons/icons8-menu-128.png" alt="">
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
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
        
        <span class ="B-title">Inscrivez-vous</span>
        <div class="main" id="main">
            <form action="" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-lg-9 col-md-12 col1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 input prenom">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                                        <label class="infocused">Prénom</label>
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-12 input nom">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nom" placeholder="Nom">
                                        <label class="infocused">Nom</label>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 input email">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Email@Email">
                                        <label class="infocused">Email</label>
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-12 input ville">
                                    <div class="form-floating">
                                        <select class="form-select" id="ville">
                                            <option value="1" selected disabled value="">Choisissez une ville</option>
                                            <option value="1">ville1</option>
                                            <option value="2">ville2</option>
                                        </select>
                                        <label class="focused">Ville</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 input MTP">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="MTP" placeholder="Mot de passe">
                                        <label class="infocused">Mot de passe</label>
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-12 input con-MTP">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="con-MTP" placeholder="Confirmation du mot de passe">
                                        <label class="infocused">Confirmation du mot de passe</label>
                                      </div>
                                </div>
                            </div>
                            
                                
                            <div class="row">
                                <div class="col-md-6 col-sm-12 input phone">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone-cabinet" placeholder="Téléphone">
                                        <label class="infocused">Téléphone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 input submit">
                                    <button class="btn" type="submit">Créer un compte</button>
                                </div>
                            </div>
                    </div>
                    
                </div>
            </form>
            
        </div>

        
            
        
    </div>


    

    <script src="js/sign_up-user.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    
</body>

</html>