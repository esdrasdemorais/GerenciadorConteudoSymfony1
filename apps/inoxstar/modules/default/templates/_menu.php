<?php /*foreach ($categories as $category) : ? >
	<li>
		<a href="<?php echo url_for('default/showProducts?category='
		    . $category->getNamNormalized() . '&page=1') ?>
		">
	    		<?php echo $category->getNam() ?>
		</a>
    	</li>
<? php #endforeach; */ ?>
<ul id="filterOptions">
<?php
$activeAll = 'class="active"';
$labelAll  = 'Todos';
if (strlen(trim($sf_params->get('category')))) {
    $activeAll = '';
}

if (strlen(trim($sf_params->get('tag')))) {
    $labelAll = str_replace("-", " ", 
        ucwords($sf_params->get('tag')));
}
?>
    <li <?php echo $activeAll ?>><a href="/#work" class="all"><?php echo $labelAll ?></a></li>

    <?php
    foreach ($categories as $category) :
	$activeClass = '';
	if ($sf_params->get('category') == $category->getNam()) {
	    $activeClass = 'class="active"';
	}
    ?>
    <li <?php echo $activeClass ?>>
	<a href="javascript:void(0)" class="<?php echo $category->getNam() ?>"
	    onclick="window.location='/categoria/<?php echo $category->getNam() ?>/1.html#work'"
	>
	    <?php echo ucwords($category->getNam()) ?></a>
    </li>
    <?php endforeach; ?>

    <li><a href="#" class="catalogo">Cat&aacute;logo</a></li>
    <li><a href="#" class="nova_linha">Nova Stud Bolts</a></li>
</ul>
