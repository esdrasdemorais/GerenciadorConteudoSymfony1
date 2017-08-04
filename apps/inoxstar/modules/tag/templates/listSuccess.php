<fieldset>
<div class="toolbar">
	<?php echo link_to('Novo', '/tag/new') ?>
</div>
<table class="list">
<?php foreach($pager->getResults() as $tag) : ?>
  <tr>
    <td><?php echo($tag->getNam()) ?></td>
    <td><?php echo('1' === $tag->getEn() ? 'Ativa' : 'Desativada') ?></td>
    <td>
	<!--<input type="button" onclick="/tag/new/id/<?php echo($tag->getId()) ?>" value="Editar" />-->
	<a href="/tag/new/id/<?php echo $tag->getId() ?>">Editar</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
</fieldset>
