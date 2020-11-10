<?php
session_start();

$dsn = 'mysql:dbname=exo_netflix;host=localhost';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $pdo->prepare('SELECT * FROM user WHERE id_user = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exo Netflix Virgile Profil</title>
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
                    <h2>INFORMATION DE COMPTE</h2>
                    <h3>Votre nom d'utilisateur est <?php echo $userinfo['username']; ?></h3>
                    <p>Votre adresse mail est '<?php echo $userinfo['email']; ?>'</p>
                    <?php
                    if (isset($_SESSION['id_user']) and $userinfo['id_user'] == $_SESSION['id_user']) {
                    ?>
                        <a href="deconnexion.php">Se déconnecter ?</a>
                    <?php
                    }
                    ?>
                </div>
            </section>

        </main>


        <footer>

            <section id="sFooter" class="flex">

                <p>Des questions ? Appelez le 0000-000-000</p>

            </section>

        </footer>

    </body>
<?php
}
?>