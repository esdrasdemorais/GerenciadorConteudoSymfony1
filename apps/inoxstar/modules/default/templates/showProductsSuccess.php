<?php include_partial('menu', array('categories' => $categories)) ?>

<ul class="portfolioholder">

<div id="menu_categories">
<?php #include_partial('menu', array('categories' => $categories)) ?>
</div>

<div id="product-box">
<?php if (strlen(trim($message))): ?>
	<?php echo $message; ?>
<?php else: ?>

<?php foreach ($pager->getResults() as $product) : ?>
<?php
$photo = $product->getPhoto();
$path = $photo->getRelativePath() . $photo->getNam();

include_partial(
   'default/products/product', 
   array(
       'name' => $product->getNam(),
       'path' => $path,
       'pric' => $product->getPrice()
   )
)
?>
<?php endforeach; ?>

<div id="pagination">
<?php 
include_partial(
	'default/products/pages', 
	array('pager' => $pager, 'url' => $url)
)
?>
</div>

<?php endif; ?>
</div>


<!--<div id="tag-box">
<?php #include_partial('tags', array('tags' => $tags)) ?>
</div>-->

</ul>

<?php
if ("desktop" === $sf_user->getAttribute('deviceClass'))
	include_partial('default/products/filter');
?>

