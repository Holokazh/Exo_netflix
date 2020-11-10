<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo Netflix Virgile Acceuil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>

        <section id="sNav">
            <a href="index.php" id="logoNetflixHeader" class="flex"><img src="img/logoNetflix.png" alt="logo Netflix"></a>
        </section>

    </header>


    <main>

        <section id="sPrincipale" class="flex">
            <div id="divLogin" class="flex">
                <form method="POST" action="login.php" class="flex">
                    <h2>S'identifier</h2>

                    <!-- <label for="username">Nom d'utilisateur</label> -->
                    <input type="text" id="username" name="userconnect" placeholder="Entrez votre nom d'utilisateur">

                    <!-- <label for="password">Mot de passe</label> -->
                    <input type="password" id="password" name="mdpconnect" placeholder="Entrez votre mot de passe">

                    <?php
                    if (isset($erreur)) {
                        echo '<font color="red">' . $erreur . "</font>";
                    }
                    ?>

                    <?php

                    if (isset($_SESSION["error"])) {
                        echo $_SESSION["error"] . "<br>";
                    } else { }

                    ?>

                    <input type="submit" name="formconnexion" id="submit" value="S'identifier">
                </form>

                <p>Première visite sur Netflix ? <a href="inscriptionhtml.php">Inscrivez-vous</a>.</p>
            </div>
        </section>

    </main>


    <footer>

        <section id="sFooter" class="flex">

            <p>Des questions ? Appelez le 0000-000-000</p>

        </section>

    </footer>

</body>

</html>