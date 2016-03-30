<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdPricedetail as BaseSdPricedetail;

/**
 * This is the model class for table "sd_pricedetail".
 */
class SdPricedetail extends BaseSdPricedetail
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount_pricedetail', 'value_pricedetail', 'line_pricedetail', 'tax_id', 'sd_price_id', 'sd_salesitem_id', 'currency_id'], 'integer'],
            [['name_pricedetail'], 'string', 'max' => 45]
        ];
    }
	
}
