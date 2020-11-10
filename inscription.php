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

foreach ($_POST as $key => $val) {
    if (!empty($val)) {
        ${$key} = htmlspecialchars($val);
    } else {
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit();
}

$inscr = $pdo->prepare("SELECT username FROM user WHERE username = :username");
$inscr->bindParam(":username", $username);
$inscr->execute();
$result = $inscr->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo "Le nom d'utilisateur est déjà pris, veuillez en choisir un autre.";
    exit();
}

$inscr = $pdo->prepare("SELECT email FROM user WHERE email = :email");
$inscr->bindParam(":email", $email);
$inscr->execute();
$resultemail = $inscr->fetch(PDO::FETCH_ASSOC);
if ($resultemail) {
    echo "L'email est déjà pris, veuillez en choisir une autre.";
    exit();
}

if ($mdp1 !== $mdp2) {
    echo "Le mot de passe n'est pas le même !";
    exit();
}



function inscription($val1, $val2, $val3, $pdo)
{
    try {
        $inscr = $pdo->prepare("INSERT INTO user (username, email, password) values (:username, :email, :password)");
        $inscr->bindParam(":username", $val1);
        $inscr->bindParam(":email", $val2);
        $inscr->bindParam(":password", sha1($val3));
        $inscr->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

if (inscription($username, $email, $mdp1, $pdo)) {
    $_SESSION["success"] = "Votre compte a été créé, vous pouvez désormais vous connecter.";
    header("Location:index.php");
    exit();
} else {
    $_SESSION["error"] = "Il y a eu une erreur, veuillez recommencer ultérieurement";
    header("Location:inscriptionhtml.php");
    exit();
}
