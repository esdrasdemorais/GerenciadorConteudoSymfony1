<?php

/**
 * sfGuardUserPermission form base class.
 *
 * @package    form
 * @subpackage sf_guard_user_permission
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BasesfGuardUserPermissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'permission_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardPermission', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserPermission';
  }


}
