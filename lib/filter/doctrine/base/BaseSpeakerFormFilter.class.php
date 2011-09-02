<?php

/**
 * Speaker filter form base class.
 *
 * @package    regist
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpeakerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'      => new sfWidgetFormFilterInput(),
      'starttime'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'endtime'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'blog'       => new sfWidgetFormFilterInput(),
      'plurk'      => new sfWidgetFormFilterInput(),
      'twitter'    => new sfWidgetFormFilterInput(),
      'gplus'      => new sfWidgetFormFilterInput(),
      'facebook'   => new sfWidgetFormFilterInput(),
      'slide'      => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'keynote'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'starttime'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'endtime'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'blog'       => new sfValidatorPass(array('required' => false)),
      'plurk'      => new sfValidatorPass(array('required' => false)),
      'twitter'    => new sfValidatorPass(array('required' => false)),
      'gplus'      => new sfValidatorPass(array('required' => false)),
      'facebook'   => new sfValidatorPass(array('required' => false)),
      'slide'      => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'keynote'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('speaker_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Speaker';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'email'      => 'Text',
      'starttime'  => 'Date',
      'endtime'    => 'Date',
      'blog'       => 'Text',
      'plurk'      => 'Text',
      'twitter'    => 'Text',
      'gplus'      => 'Text',
      'facebook'   => 'Text',
      'slide'      => 'Text',
      'content'    => 'Text',
      'keynote'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
