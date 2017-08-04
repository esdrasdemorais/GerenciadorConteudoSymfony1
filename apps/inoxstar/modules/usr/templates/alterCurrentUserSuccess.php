<fieldset>
<legend>Alterar Senha</legend>
<?php use_helper('Validation'); ?>
<?php
// Is logged and came from exactly usr controller action
if ($sf_user->getAttribute('id') === $userModel->getId()) :
?>
<?php echo form_tag('usr/changePass', 'method=post class=loginForm') ?>
  <?php echo input_hidden_tag($userModel, 'getId') ?>
  <?php echo label_for('oldpass', 'Informe a senha atual:') ?>
  <?php echo input_password_tag('oldpass', '', 'maxlength=70') ?><br />
  <?php echo label_for('newpass', 'Informe a nova senha:') ?>
  <?php echo input_password_tag('pass', '', 'maxlength=70') ?><br />
  <?php echo label_for('cnfpass', 'Confirme a nova senha:') ?>
  <?php echo input_password_tag('conf', '', 'maxlength=70') ?><br />
  <?php echo submit_tag('Salvar') ?>
</form>
<?php endif; ?>
</fieldset>
