<?php

/**
 * UsInoxStar form base class.
 *
 * @package    form
 * @subpackage us_inox_star
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseUsInoxStarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'nam'   => new sfWidgetFormInput(),
      'pas'   => new sfWidgetFormInput(),
      'en'    => new sfWidgetFormInput(),
      'admin' => new sfWidgetFormInput(),
      'sal'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'UsInoxStar', 'column' => 'id', 'required' => false)),
      'nam'   => new sfValidatorString(array('max_length' => 170)),
      'pas'   => new sfValidatorString(array('max_length' => 70)),
      'en'    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'admin' => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'sal'   => new sfValidatorString(array('max_length' => 70)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'UsInoxStar', 'column' => array('nam')))
    );

    $this->widgetSchema->setNameFormat('us_inox_star[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsInoxStar';
  }


}
