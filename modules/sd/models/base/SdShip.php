<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_ship".
 *
 * @property integer $id
 * @property string $code_ship
 * @property string $desc_ship
 * @property integer $cost_ship
 * @property integer $worktime_ship 
 * @property integer $loadtime_ship 
 * @property integer $pciktime_ship 
 * @property string $startday_ship 
 * @property string $endday_ship 
 * @property string $created_at
 * @property string $updated_at
 * @property integer $currency_id
 *
 * @property \app\modules\sd\models\SdCustomer[] $sdCustomers
 * @property \app\modules\sd\models\SdSale[] $sdSales
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\SdShipdetail[] $sdShipdetails
 */
class SdShip extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_ship';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_ship' => 'Code Ship',
            'desc_ship' => 'Desc Ship',
            'cost_ship' => 'Cost Ship',
            'worktime_ship' => 'Worktime Ship', 
            'loadtime_ship' => 'Loadtime Ship', 
            'pciktime_ship' => 'Pciktime Ship', 
            'startday_ship' => 'Startday Ship', 
            'endday_ship' => 'Endday Ship', 
            'currency_id' => 'Currency ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCustomers()
    {
        return $this->hasMany(\app\modules\sd\models\SdCustomer::className(), ['sd_ship_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_ship_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(\app\modules\master\models\Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShipdetails()
    {
        return $this->hasMany(\app\modules\sd\models\SdShipdetail::className(), ['sd_ship_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdShipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdShipQuery(get_called_class());
    }
}
