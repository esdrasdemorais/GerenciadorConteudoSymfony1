<fieldset id="login">
<?php use_helper('Validation'); ?>
<?php use_helper('Form'); ?>
<?php echo form_tag('/usr/login', 'method=post class=loginForm') ?>
  <?php if ($sf_request->hasErrors()): ?>
  <ul class="form_error">
    <?php foreach($sf_request->getErrors() as $name => $error): ?>
    <li><?php echo $name ?>: <?php echo $error ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
  <?php echo label_for('login', 'Informe seu login:') ?>
  <?php echo input_tag('login', '', 'maxlength=70') ?><br />
  <?php echo label_for('pass', 'Informe sua senha:') ?>
  <?php echo input_password_tag('pass', '', 'maxlength=70') ?><br />
  <img src="<?php echo url_for('sfCaptcha/index'); ?>" alt="captcha" />
  <?php echo form_error('captcha'); ?>
  <?php echo input_tag('captcha'); ?><br />
  <?php echo submit_tag('Login') ?>
</form>
</fieldset>
