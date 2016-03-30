<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_taxdetail".
 *
 * @property integer $id
 * @property string $name_taxdetail
 * @property integer $value_taxdetail
 * @property string $country_taxdetail
 * @property integer $tax_id
 * @property integer $currency_id
 * @property integer $sd_sale_id
 *
 * @property \app\modules\sd\models\SdSale[] $sdSales
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\Tax $tax
 * @property \app\modules\sd\models\SdSale $sdSale
 */
class SdTaxdetail extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_taxdetail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_taxdetail' => 'Name Taxdetail',
            'value_taxdetail' => 'Value Taxdetail',
            'country_taxdetail' => 'Country Taxdetail',
            'tax_id' => 'Tax ID',
            'currency_id' => 'Currency ID',
            'sd_sale_id' => 'Sd Sale ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_taxdetail_id' => 'id']);
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
    public function getTax()
    {
        return $this->hasOne(\app\modules\master\models\Tax::className(), ['id' => 'tax_id']);
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
     * @return \app\modules\sd\models\SdTaxdetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdTaxdetailQuery(get_called_class());
    }
}
