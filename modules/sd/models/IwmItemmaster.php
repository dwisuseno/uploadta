<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\IwmItemmaster as BaseIwmItemmaster;

/**
 * This is the model class for table "iwm_itemmaster".
 */
class IwmItemmaster extends BaseIwmItemmaster
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight_itemmaster', 'price_itemmaster', 'uom_id', 'currency_id'], 'integer'],
            [['code_itemmaster'], 'string', 'max' => 45],
            [['desc_itemmaster'], 'string', 'max' => 100]
        ];
    }
	
}
