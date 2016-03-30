<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdDivision as BaseSdDivision;

/**
 * This is the model class for table "sd_division".
 */
class SdDivision extends BaseSdDivision
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['code_division'], 'string', 'max' => 45],
            [['name_division'], 'string', 'max' => 100]
        ];
    }
	
}
