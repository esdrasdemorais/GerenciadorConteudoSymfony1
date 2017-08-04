<fieldset>
<legend>Cadastro Tag</legend>
<?php use_helper('Validation'); ?>
<?php use_helper('Form'); ?>
<?php echo form_tag('tag/save', 'method=post class=inputForm') ?>
  <?php echo input_hidden_tag('tag', $tag->getId()) ?>
  <?php echo label_for('name', 'Informe o nome da tag:') ?>
  <?php echo input_tag('name', $tag->getNam(), 'maxlength=255') ?><br />
  <?php echo checkbox_tag('enable', '1', 
			'1' === $tag->getEn() ? "checked=checked" : '') ?>
  <br />
  <?php echo submit_tag('Salvar') ?>
</form>
</fieldset>
