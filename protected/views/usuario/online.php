<?php 
// $usuarios -> es un objeto tipo usuario
// $user_email -> es un objeto tipo crugeuser
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Lista de Usuarios Online</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden ver los <strong>Usuarios</strong> que estan <strong>Online</strong> en este momento</p>
	</div>
</div>

<table>
  <thead>
    <tr>
      <th>Rut</th>
      <th>Nombre</th>
      <th>Correo</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($online_user as $u): ?>
    <tr>
      <td><?php echo $u['rut']; ?></td>
      <td><?php echo $u['nombre']; ?></td>
      <td><?php echo $u['email']; ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>