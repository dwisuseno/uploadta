<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdShipinventory as BaseSdShipinventory;

/**
 * This is the model class for table "sd_shipinventory".
 */
class SdShipinventory extends BaseSdShipinventory
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cap_shipinventory'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_shipinventory'], 'string', 'max' => 45],
            [['name_shipinventory'], 'string', 'max' => 100]
        ];
    }
	
}
