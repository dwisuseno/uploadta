<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdShiprule as BaseSdShiprule;

/**
 * This is the model class for table "sd_shiprule".
 */
class SdShiprule extends BaseSdShiprule
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rule_shiprule'], 'string'],
            [['value_shiprule', 'sd_shipcondition_id', 'uom_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }
	
}
