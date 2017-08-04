<fieldset>
<div class="toolbar">
	<?php echo link_to('Novo', '/category/new') ?>
</div>
<table class="list">
<?php foreach($pager->getResults() as $category) : ?>
  <tr>
    <td><?php echo($category->getNam()) ?></td>
    <td><?php echo('1' === $category->getEn() ? 'Ativa' : 'Desativada') ?></td>
    <td>
        <a href="/category/new/id/<?php echo $category->getId() ?>">Editar</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
</fieldset>
