<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSalesorg as BaseSdSalesorg;

/**
 * This is the model class for table "sd_salesorg".
 */
class SdSalesorg extends BaseSdSalesorg
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['code_salesorg'], 'string', 'max' => 45],
            [['name_salesorg'], 'string', 'max' => 100]
        ];
    }
	
}
