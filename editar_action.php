<?php
require 'config.php';
$Id = filter_input(INPUT_POST, 'id');
$nAme = filter_input(INPUT_POST, 'nome');
$emAil = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($Id && $nAme && $emAil) {
  $sql = $pdo->prepare("UPDATE usuarios SET  nome = :name , email = :email WHERE id = :id");
  $sql->bindValue(':id', $Id);
  $sql->bindValue(':name', $nAme);
  $sql->bindValue(':email', $emAil);
  $sql->execute();
  header('Location: index.php');
  exit;
} else {

  header('Location: adicionar.php');
  exit;
}
