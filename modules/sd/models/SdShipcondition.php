<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdShipcondition as BaseSdShipcondition;

/**
 * This is the model class for table "sd_shipcondition".
 */
class SdShipcondition extends BaseSdShipcondition
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['code_shipcondition'], 'string', 'max' => 45],
            [['desc_shipcondition'], 'string', 'max' => 100],
        ];
    }
	
}
