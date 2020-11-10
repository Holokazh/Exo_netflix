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

// ----------------------------------------------------------------------------------------------------------- //


if (isset($_POST['formconnexion'])) {
   $userconnect = htmlspecialchars($_POST['userconnect']);
   $mdpconnect = htmlspecialchars($_POST['mdpconnect']);
   if (!empty($userconnect) and !empty($mdpconnect)) {
      $requser = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
      $requser->bindParam(":username", $userconnect);
      $requser->bindParam(":password", sha1($mdpconnect));
      $requser->execute();
      $userexist = $requser->rowCount();
      if ($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['username'] = $userinfo['username'];
         $_SESSION['email'] = $userinfo['email'];
         header("Location: profil.php?id=" . $_SESSION['id_user']);
      } else {
         $_SESSION["error"] = "Nom d'utilisateur ou mot de passe erroné !";
         header("Location: index.php");
      }
   } else {
      $_SESSION["error"] = "Tous les champs doivent être remplis !";
      header("Location: index.php");
   }
}
