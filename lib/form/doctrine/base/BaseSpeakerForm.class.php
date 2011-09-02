<?php

/**
 * Speaker form base class.
 *
 * @method Speaker getObject() Returns the current form's model object
 *
 * @package    regist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSpeakerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'starttime'  => new sfWidgetFormDateTime(),
      'endtime'    => new sfWidgetFormDateTime(),
      'blog'       => new sfWidgetFormInputText(),
      'plurk'      => new sfWidgetFormInputText(),
      'twitter'    => new sfWidgetFormInputText(),
      'gplus'      => new sfWidgetFormInputText(),
      'facebook'   => new sfWidgetFormInputText(),
      'slide'      => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormInputText(),
      'keynote'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'starttime'  => new sfValidatorDateTime(),
      'endtime'    => new sfValidatorDateTime(),
      'blog'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'plurk'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gplus'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slide'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'keynote'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('speaker[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Speaker';
  }

}
