<?php

/**
 * sfGuardGroupPermission form base class.
 *
 * @package    form
 * @subpackage sf_guard_group_permission
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BasesfGuardGroupPermissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'      => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'group_id'      => new sfValidatorPropelChoice(array('model' => 'sfGuardGroup', 'column' => 'id', 'required' => false)),
      'permission_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardPermission', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_group_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardGroupPermission';
  }


}
