<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_pricedetail".
 *
 * @property integer $id
 * @property string $name_pricedetail
 * @property integer $amount_pricedetail
 * @property integer $value_pricedetail
 * @property integer $line_pricedetail
 * @property integer $tax_id
 * @property integer $sd_price_id
 * @property integer $sd_salesitem_id
 * @property integer $currency_id
 *
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\SdPrice $sdPrice
 * @property \app\modules\sd\models\SdSalesitem $sdSalesitem
 * @property \app\modules\sd\models\Tax $tax
 */
class SdPricedetail extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_pricedetail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_pricedetail' => 'Name Pricedetail',
            'amount_pricedetail' => 'Amount Pricedetail',
            'value_pricedetail' => 'Value Pricedetail',
            'line_pricedetail' => 'Line Pricedetail',
            'tax_id' => 'Tax ID',
            'sd_price_id' => 'Sd Price ID',
            'sd_salesitem_id' => 'Sd Salesitem ID',
            'currency_id' => 'Currency ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(\app\modules\sd\models\Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdPrice()
    {
        return $this->hasOne(\app\modules\sd\models\SdPrice::className(), ['id' => 'sd_price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesitem()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalesitem::className(), ['id' => 'sd_salesitem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTax()
    {
        return $this->hasOne(\app\modules\sd\models\Tax::className(), ['id' => 'tax_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdPricedetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdPricedetailQuery(get_called_class());
    }
}
