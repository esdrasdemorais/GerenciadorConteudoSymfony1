<ul class="tags">
<?php foreach ($tags as $tag) : ?>
	<li>
		<a href="<?php echo url_for('default/showProducts?tag='
		    . $tag->getNam() . '&page=1') ?>
		">
			<?php echo $tag->getNam() ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
