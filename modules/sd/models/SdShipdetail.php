<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdShipdetail as BaseSdShipdetail;

/**
 * This is the model class for table "sd_shipdetail".
 */
class SdShipdetail extends BaseSdShipdetail
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sd_ship_id', 'sd_shipinventory_id', 'cost_shipdetail', 'currency_id'], 'integer']
        ];
    }
	
}
