<?php

/**
 * Member form.
 *
 * @package    regist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MemberForm extends BaseMemberForm {

    /**
     * callback 驗證Email是否重複
     */
    public function cbValidateEmailUnique(sfValidatorCallback $Validator, $Value, $Arguments) {
        $Value = strtolower($Value);
        if (MemberTable::getInstance()->findOneByEmail($Value)) {
            throw new sfValidatorError($Validator, 'invalid', array('value' => $Value));
        }
        return $Value;
    }

    /**
     * 隱藏受保護的欄位
     */
    protected function protectedColumn() {
        unset($this['created_at']);
        unset($this['updated_at']);
    }

    /**
     * 設定表單欄位屬性
     */
    protected function setFieldType(){
        $this->widgetSchema['name'] = new sfWidgetFormInput(array(
                    'label' => '姓名'
                ));
        $this->widgetSchema['email'] = new sfWidgetFormInput(array(
                    'label' => 'Email'
                ));
        $this->widgetSchema['sex'] = new sfWidgetFormChoice(array(
                    'label' => '性別',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'm' => '男生',
                        'f' => '女生',
                    ),
                    'default' => 'm',
                ));
    }

    /**
     * 設定表單欄位驗證規則
     */
    protected function setFieldValidator(){
        $this->validatorSchema['name'] = new sfValidatorString(
                        array(
                            'required' => true,
                            'max_length' => 128
                        ),
                        array(
                            'required' => '必填欄位',
                            'max_length' => '字數太長了 (不可超過 %max_length% 個字元)。'
                        )
        );
        $this->validatorSchema['email'] = new sfValidatorAnd(
                        array(
                            new sfValidatorEmail(
                                    array(
                                        'required' => true,
                                    ),
                                    array(
                                        'invalid' => 'Email格式錯誤',
                                    )
                            ),
                            new sfValidatorCallback(
                                    array(
                                        'callback' => array($this, 'cbValidateEmailUnique'),
                                    ),
                                    array(
                                        'invalid' => 'Email重複',
                                    )
                            ),
                        ),
                      array(),
                      array('required' => '必填欄位')
        );
        $this->validatorSchema['sex'] = new sfValidatorChoice(
                        array(
                            'required' => true,
                            'multiple' => false,
                            'choices' => array('m', 'f'),
                        ),
                        array(
                            'required' => '必填欄位',
                            'invalid' => '格式錯誤'
                        )
        );
        $this->validatorSchema['phone'] = new sfValidatorRegex(
                        array(
                            'required' => true,
                            'pattern' => '/^[0-9]{9,10}$/i',
                            'must_match' => true
                        ),
                        array(
                            'required' => '必填欄位',
                            'invalid' => '格式錯誤，室內電話必須為02xxxxxxx(包含區碼)，行動電話必須為10碼。'
                        )
        );
    }
    public function configure() {
        $this->protectedColumn();
        $this->setFieldType();
        $this->setFieldValidator();
    }

}
