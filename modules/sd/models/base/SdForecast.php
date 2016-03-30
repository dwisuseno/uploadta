<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_forecast".
 *
 * @property integer $id
 * @property string $code_forecast
 * @property integer $year_forecast
 * @property integer $demand_forecast
 * @property string $month_forecast
 * @property integer $predict_forecast
 * @property double $error_forecast
 * @property integer $sd_sale_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdSale $sdSale
 */
class SdForecast extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_forecast';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_forecast' => 'Code Forecast',
            'year_forecast' => 'Year Forecast',
            'demand_forecast' => 'Demand Forecast',
            'month_forecast' => 'Month Forecast',
            'predict_forecast' => 'Predict Forecast',
            'error_forecast' => 'Error Forecast',
            'sd_sale_id' => 'Sd Sale ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSale()
    {
        return $this->hasOne(\app\modules\sd\models\SdSale::className(), ['id' => 'sd_sale_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdForecastQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdForecastQuery(get_called_class());
    }
}
