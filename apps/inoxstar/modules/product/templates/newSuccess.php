<?php use_helper('Form'); ?>
<?php use_helper('Validation'); ?>
<fieldset>
<legend><p>Cadastro de Produtos</p></legend>
  <?php echo form_tag('product/save', 'method=post multipart=true 
  		class=inputForm') ?>

  <?php if ($sf_request->hasErrors()): ?>
  <ul class="form_error">
    <?php foreach($sf_request->getErrors() as $name => $error): ?>
    <li><?php echo $name ?>: <?php echo $error ?></li>
    <?php endforeach; ?>
  </ul>
  <?php elseif (strlen(trim($sf_user->getFlash('message')))): ?>
     <li class="form_error"><?php echo $sf_user->getFlash('message') ?></li>
  <?php endif; ?>

  <?php echo input_hidden_tag('product', $product->getId()) ?>

  <?php echo label_for('name', 'Informe o nome do produto:') ?>
  <?php echo input_tag('name', $product->getNam(), 'maxlength=255 size=40') ?><br />
  <?php echo label_for('desc', 'Informe a descri&ccedil;&atilde;o do produto:') ?>
  <?php echo textarea_tag('descr', $product->getDescr(), 'cols=50') ?><br />
  <?php echo label_for('category', 'Selecione ao menos uma categoria:') ?>
  <?php echo select_tag('category[]', options_for_select($categories)) ?>
  <br />
  <?php echo link_to('Clique aqui para inserir uma nova categoria', 
			'/category/new', 'target=blank') ?>
  <br />
  <fieldset>
    <legend>Tags</legend>
    <div style="float:left; margin-top: -55px;" id="tagList"></div>
    <?php echo label_for('tag', 'Informe ao menos uma tag:') ?>
    <?php echo input_hidden_tag('tags', $prTagIds, 'id=tags') ?>
    <?php echo input_tag('tag', '', 'size=50');  #textarea_tag('tag', '', 'size=50x2') ?>
    <script type="text/javascript">
    <?php foreach(json_decode($prTags, true) as $tag) : ?>
	tagArr[<?php echo $tag['id'] ?>] = <?php echo $tag['id'] ?>;

	$("#tagList").html(
	    $("#tagList").html() + "<span id=\"t_" + 
	    <?php echo $tag['id'] ?> + "\"><?php echo $tag['tg'] ?>" + 
	    " <a href=\"javascript:void(0)\" id=\"tr_" +
	    <?php echo $tag['id'] ?> + "\" onclick=\"removeTag(" +
	    <?php echo $tag['id'] ?> + ")" + "\">[-]</a></span>"
	);
    <?php endforeach; ?>

	$("#tags").val(JSON.stringify(tagArr));
    </script>
  </fieldset>
  <br />
  <?php echo label_for('photo', 'Selecione a foto do produto:') ?>
  <?php echo input_file_tag('photo') ?>
  <?php if (!empty($photo)) : echo '<img src="' . $path . $photo->getNam() . 
  '"';  endif; ?>
  <br />
  <?php echo label_for('enable', 'Ativo:') ?>
  <?php echo checkbox_tag('enable', '1', '1' === $product->getEn() ? 
	"checked=checked" : "checked=checked") ?><br />
  <?php echo submit_tag('Salvar') ?>
</form>
</fieldset>
