<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSalestype as BaseSdSalestype;

/**
 * This is the model class for table "sd_salestype".
 */
class SdSalestype extends BaseSdSalestype
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_salestype'], 'string', 'max' => 45],
            [['desc_salestype'], 'string', 'max' => 100]
        ];
    }
	
}
