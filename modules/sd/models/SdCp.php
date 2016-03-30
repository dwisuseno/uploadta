<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdCp as BaseSdCp;

/**
 * This is the model class for table "sd_cp".
 */
class SdCp extends BaseSdCp
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_cp'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_cp', 'firstname_cp', 'middlename_cp', 'lastname_cp', 'email_cp', 'telp_cp', 'telpext_cp', 'mobile_cp', 'department_cp'], 'string', 'max' => 45]
        ];
    }
	
}
