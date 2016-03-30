<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdCustomeraccount as BaseSdCustomeraccount;

/**
 * This is the model class for table "sd_customeraccount".
 */
class SdCustomeraccount extends BaseSdCustomeraccount
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gl_bank_id', 'sd_customer_id'], 'integer'],
            [['city_bank', 'country_bank', 'key_bank', 'account_bank', 'holder_customeraccount'], 'string', 'max' => 45]
        ];
    }
	
}
