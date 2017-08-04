<fieldset class="list">
<div class="toolbar">
	<?php echo link_to('Novo', '/product/new') ?>
</div>
<table class="list">
<?php foreach($products->getResults() as $product) :
    $photo = $product->getPhoto();
    $path = $photo->getRelativePath() . $photo->getNam();
?>
  <tr>
    <td width="30%"><?php echo($product->getNam()) ?></td>
    <td><?php echo($product->getPrice()) ?></td>
    <td>
	<?php foreach ($product->getCategories() as $category) : ?>
	<?php echo($category->getNam()) ?>
	<?php endforeach; ?>
    </td>
    <td>
	<?php 
	$tags = $product->getTags();
	foreach($tags as $key => $tag) : 
	?>
	<?php echo($tag->getNam()) ?>
	<?php echo(count($tags) > ($key + 1) ? ', ' : '') ?>
	<?php endforeach; ?>
    </td>
    <td width="15%">
	    <img src="<?php echo($path) ?>" width="30%" />
    </td>
    <td>
        <?php echo('1' === $product->getEn() ? 'Ativo' : 'Desativado') ?>
    </td>
    <td>
        <a href="/product/new/id/<?php echo($product->getId()) ?>">
		Editar
	</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
</fieldset>
