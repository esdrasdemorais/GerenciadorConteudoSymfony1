<fieldset>
<legend>Cadastro Usu&aacute;rio</legend>
<?php echo form_tag('usr/save', 'method=post class=loginForm') ?>
  <?php echo label_for('login', 'Informe o login:') ?>
  <?php echo object_input_tag($user, 'getNam', 'maxlength=70') ?>
  <?php echo label_for('pass', 'Informe a senha:') ?>
  <?php echo input_password_tag('pass', '', 'maxlength=70') ?>
  <?php echo label_for('conf', 'Confirme a senha:') ?>
  <?php echo input_password_tag('conf', '', 'maxlength=70') ?>
  <?php echo checkbox_tag('enable', true === $user->getEn() ? '1' : '0', 
				true === $user->getEn() ? true : false) ?>
  <?php echo checkbox_tag('type', true === $user->getAdmin() ? '1' : '0', 
				true === $user->getEn() ? true : false) ?>
				publisher
  <?php echo submit_tag('Salvar') ?>
</form>
</fieldset>
