<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "iwm_itemmaster".
 *
 * @property integer $id
 * @property string $code_itemmaster
 * @property string $desc_itemmaster
 * @property integer $weight_itemmaster
 * @property integer $price_itemmaster
 * @property integer $uom_id
 * @property integer $currency_id
 *
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\Uom $uom
 * @property \app\modules\sd\models\SdSalesitem[] $sdSalesitems
 */
class IwmItemmaster extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iwm_itemmaster';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_itemmaster' => 'Code Itemmaster',
            'desc_itemmaster' => 'Desc Itemmaster',
            'weight_itemmaster' => 'Weight Itemmaster',
            'price_itemmaster' => 'Price Itemmaster',
            'uom_id' => 'Uom ID',
            'currency_id' => 'Currency ID',
        ];
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
    public function getUom()
    {
        return $this->hasOne(\app\modules\master\models\Uom::className(), ['id' => 'uom_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesitems()
    {
        return $this->hasMany(\app\modules\sd\models\SdSalesitem::className(), ['iwm_itemmaster_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\IwmItemmasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\IwmItemmasterQuery(get_called_class());
    }
}
