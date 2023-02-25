<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="..\fontawesome\css\all.css">
    <link rel="stylesheet" href="..\style\administration.css">
    <title>Document</title>
</head>

<body>
    <?php
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        session_start();
        $_SESSION['id']=$_POST["id"];
    
    ?>
    <div class="header">
        <form action="../index.php" method="post">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand">Lo-Go</a>
            <button type="submit" name="logout" class="btn btn-success Sign_out">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </nav>
        </form>
    </div>
    <div class="main">
        <aside class="sidebar">
            <div class="offcanvas-body">
                <!-- <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item">Demandes d'inscription</li>
                </ul> -->
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item">conversation</li>
                </ul>
            </div>
        </aside>
        <iframe src="conversation\contacts.php">

        </iframe>
    </div>
    
    <?php
    }
    else{
        echo '<img src="../style/media/404.png" style="width: 100%;">';
    }
    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
    }
    
    ?>
    
</body>

</html>