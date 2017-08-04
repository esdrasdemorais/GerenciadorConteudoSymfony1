<?php use_helper('Validation'); ?>
<?php use_helper('Form'); ?>
<fieldset>
<legend><p>Cadastro de Categoria</p></legend>
<?php echo form_tag('category/save', 'method=post class=inputForm') ?>
  <?php if ($sf_request->hasErrors()): ?>
  <ul class="form_error">
    <?php foreach($sf_request->getErrors() as $name => $error): ?>
    <li><?php echo $name ?>: <?php echo $error ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
  <?php echo input_hidden_tag('category', $category->getId()) ?>
  <?php echo label_for('name', 'Informe o nome da categoria:') ?>
  <?php echo input_tag('name', $category->getNam(), 'maxlength=255') ?><br />
  <?php echo label_for('enable', 'Ativa?') ?>
  <?php echo checkbox_tag('enable', '1', 
			'1' === $category->getEn() ? "checked=checked" : '') ?>
  <br />
  <?php echo submit_tag('Salvar') ?>
  <br />
  <?php if ($category->getId() > 0): ?>
  <?php echo link_to('Clique aqui para visualizar seus produtos', 
			'/category/' . $category->getNam()) ?>
  <?php endif; ?>
</form>
</fieldset>
