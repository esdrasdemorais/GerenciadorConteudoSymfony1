<fieldset>
<table>
<?php foreach($users as $user) : ?>
  <tr>
    <td><?php echo($user->getNam()) ?></td>
    <td><?php echo(true === $user->getEn() ? 'Ativo' : 'Desativado') ?></td>
    <td>
        <input type="button" onclick="user/new/id/<?php echo($user->getId()) ?>"
            value="Editar" />
    </td>
  </tr>
<?php endforeach; ?>
</table>
</fieldset>

