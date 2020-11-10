<?php

session_start()

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo Netflix Virgile</title>
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
                <form action="inscription.php" method="POST" class="flex">
                    <h2>S'inscrire</h2>

                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

                    <label for="mdp1">Mot de passe</label>
                    <input type="password" id="mdp1" name="mdp1" placeholder="Entrez votre mot de passe" required>

                    <label for="mdp2">Confirmez votre mot de passe</label>
                    <input type="password" id="mdp2" name="mdp2" placeholder="Confirmez votre mot de passe" required>

                    <?php

                    if (isset($_SESSION["error"])) {
                        echo $_SESSION["error"] . "<br>";
                    } else if (isset($_SESSION["success"])) {
                        echo $_SESSION["success"] . "<br>";
                    }

                    ?>

                    <input type="submit" id="submit" value="S'inscrire">
                </form>
                <p>Vous possédez déjà un compte ? <a href="index.php">Connectez-vous</a>.</p>
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


<?php
session_destroy();
?>