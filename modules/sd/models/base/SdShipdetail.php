<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_shipdetail".
 *
 * @property integer $id
 * @property integer $sd_ship_id
 * @property integer $sd_shipinventory_id
 * @property integer $cost_shipdetail
 * @property integer $currency_id
 *
 * @property \app\modules\sd\models\SdShip $sdShip
 * @property \app\modules\sd\models\SdShipinventory $sdShipinventory
 * @property \app\modules\sd\models\Currency $currency
 */
class SdShipdetail extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_shipdetail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sd_ship_id' => 'Sd Ship ID',
            'sd_shipinventory_id' => 'Sd Shipinventory ID',
            'cost_shipdetail' => 'Cost Shipdetail',
            'currency_id' => 'Currency ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShip()
    {
        return $this->hasOne(\app\modules\sd\models\SdShip::className(), ['id' => 'sd_ship_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShipinventory()
    {
        return $this->hasOne(\app\modules\sd\models\SdShipinventory::className(), ['id' => 'sd_shipinventory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(\app\modules\master\models\Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdShipdetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdShipdetailQuery(get_called_class());
    }
}
