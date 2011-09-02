<?php

/**
 * Speaker form.
 *
 * @package    regist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SpeakerForm extends BaseSpeakerForm {

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
        $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
                    'label' => '照片',
                    'file_src' => $this->getObject()->getPhoto(),
                    'with_delete' => false,
                    'is_image' => true,
                    'edit_mode' => true,
                ));
        $this->widgetSchema['content'] = new sfWidgetFormTextarea();
        $this->widgetSchema['keynote'] = new sfWidgetFormTextarea();

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
        $this->validatorSchema['photo'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'mime_types' => array('image/jpeg'),
                            'max_size' => 3 * 1024 * 1024
                        ),
                        array(
                            'required' => '請上傳照片',
                            'mime_types' => '圖檔格式錯誤',
                            'max_size' => '檔案太大了，不可超過3M。'
                        )
        );
       $this->validatorSchema['email'] = new sfValidatorEmail(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => 'Email格式錯誤',
                                    )
                            );
       $this->validatorSchema['blog'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
       $this->validatorSchema['plurk'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
       $this->validatorSchema['twitter'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
       $this->validatorSchema['gplus'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
       $this->validatorSchema['facebook'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
       $this->validatorSchema['slide'] = new sfValidatorUrl(
                                    array(
                                        'required' => false,
                                    ),
                                    array(
                                        'invalid' => '網址格式錯誤',
                                    )
                            );
    }

    public function configure() {
        $this->protectedColumn();
        $this->setFieldType();
        $this->setFieldValidator();
    }

    public function save($con = null) {
        if(!($File=$this->getValue('photo'))){
            return parent::save($con);
        }
        if ($Ret = parent::save($con)) {
            $this->getObject()->setPhoto($File->getTempName(), $con);
        }
        return $Ret;
    }

}
