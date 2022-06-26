<?php
require 'config.php';
$nAme = filter_input(INPUT_POST, 'nome');
$emAil = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($nAme && $emAil) {
  /*$pdo->query("INSERT INTO usuario (nome, email) VALUES ('$nAme', '$emAil')");
 o $pdo->etc deixar o sistema vulneravel 
*/
  $sql = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email ');
  $sql->bindValue(':email', $emAil);
  $sql->execute();

  if ($sql->rowCount() === 0) {

    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome , :email)");
    $sql->bindValue(':nome', $nAme);
    $sql->bindValue(':email', $emAil);
    $sql->execute();
    header('Location: index.php');
    exit;
  } else {
    header("Location: adicionar.php");
    exit;
  }

  /*$sql->bindParam(':email', $emAil);
  $nAme = 'pedro';
  $emAil = 'teste3@gamil.com';*/
} else {
  header("Location: adicionar.php");
  exit;
}
