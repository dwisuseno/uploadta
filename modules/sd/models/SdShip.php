<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdShip as BaseSdShip;

/**
 * This is the model class for table "sd_ship".
 */
class SdShip extends BaseSdShip
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost_ship', 'worktime_ship', 'loadtime_ship', 'pciktime_ship', 'currency_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_ship'], 'string', 'max' => 45],
            [['desc_ship'], 'string', 'max' => 100],
            [['startday_ship', 'endday_ship'], 'string', 'max' => 20],
        ];
    }
	
}
