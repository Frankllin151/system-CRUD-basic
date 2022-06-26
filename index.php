<?php

//acesse data bases
require 'config.php';
$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="adicionar.php">adicionar usuario</a>
<table border="1" width="100%">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>açoes</th>
  </tr>
  <?php foreach ($lista as $usuarios) : ?>
    <tr>
      <td><?= $usuarios['id'];  ?></td>
      <td><?= $usuarios['nome'];  ?></td>
      <td><?= $usuarios['email'];  ?></td>
      <td>
        <a href="editar.php?id= <?= $usuarios['id']; ?>">[EDITAR]</a>
        <a href="excluir.php?id= <?= $usuarios['id']; ?>" onclick=" return confirm('Tem certeza que deseja excluir seu perfil? ')">[EXCLUIR]</a>

      </td>
    </tr>
  <?php endforeach ?>

</table>