<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdForecast as BaseSdForecast;

/**
 * This is the model class for table "sd_forecast".
 */
class SdForecast extends BaseSdForecast
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year_forecast', 'demand_forecast', 'predict_forecast', 'sd_sale_id'], 'integer'],
            [['error_forecast'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_forecast', 'month_forecast'], 'string', 'max' => 45]
        ];
    }
	
}
