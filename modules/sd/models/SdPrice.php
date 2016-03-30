<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdPrice as BaseSdPrice;

/**
 * This is the model class for table "sd_price".
 */
class SdPrice extends BaseSdPrice
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount_price', 'currency_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_price'], 'string', 'max' => 45],
            [['name_price'], 'string', 'max' => 100]
        ];
    }
	
}
