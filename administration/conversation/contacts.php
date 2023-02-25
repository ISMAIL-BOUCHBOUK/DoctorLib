<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\fontawesome\css\all.css">
    <link rel="stylesheet" href="..\style\contacts.css">
</head>

<body>
    <?php
    session_start();
    ?>
    <table>

        <tr>
            <td class="td1">
                <aside class="sidebar">
                    <div class="recherche">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Recherche">
                    </div>
                    <div class="contacts">
                    </div>
                </aside>
            </td>
            <td class="td2">
                <div class="main">
                    <div class="title">
                        <span></span>
                    </div>
                    <div class="conversation">
                        <div class="messages">
                        </div>
                    </div>
                    <div class="message">
                        <input class="text" type="text" placeholder="Votre message">
                        <button id="send"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            </td>
        </tr>

    </table>

    <script>
        let id = <?php echo $_SESSION["id"]; ?>;
    </script>


    <script src="../../bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="../js/contacts.js"></script>
    <script>
    </script>

</body>

</html>