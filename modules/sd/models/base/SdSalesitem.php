<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_salesitem".
 *
 * @property integer $id
 * @property integer $quantity_salesitem
 * @property string $uom_salesitem
 * @property string $desc_salesitem
 * @property double $price_salesitem
 * @property double $priceori_salesitem
 * @property double $linetotal_salesitem
 * @property integer $delivqty_salesitem
 * @property integer $confirmqty_salesitem
 * @property integer $pickqty
 * @property integer $batch
 * @property double $weight_salesitem
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iwm_item_master_id
 * @property integer $sd_sale_id
 * @property integer $currency_id 
 *
 * @property \app\modules\sd\models\SdPricedetail[] $sdPricedetails
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\IwmItemMaster $iwmItemMaster
 * @property \app\modules\sd\models\SdSale $sdSale
 * @property \app\modules\sd\models\SdSchedule[] $sdSchedules
 */
class SdSalesitem extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_salesitem';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity_salesitem' => 'Quantity',
            'uom_salesitem' => 'Uom Salesitem',
            'desc_salesitem' => 'Desc Salesitem',
            'price_salesitem' => 'Price Salesitem',
            'priceori_salesitem' => 'Priceori Salesitem',
            'linetotal_salesitem' => 'Linetotal Salesitem',
            'delivqty_salesitem' => 'Delivqty Salesitem',
            'confirmqty_salesitem' => 'Confirmqty Salesitem',
            'pickqty' => 'Pickqty',
            'batch' => 'Batch',
            'weight_salesitem' => 'Weight Salesitem',
            'iwm_item_master_id' => 'Iwm Item Master ID',
            'sd_sale_id' => 'Sd Sale ID',
            'currency_id' => 'Currency ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdPricedetails()
    {
        return $this->hasMany(\app\modules\sd\models\SdPricedetail::className(), ['sd_salesitem_id' => 'id']);
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
    public function getIwmItemMaster()
    {
        return $this->hasOne(\app\modules\iwm\models\IwmItemMaster::className(), ['id' => 'iwm_item_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSale()
    {
        return $this->hasOne(\app\modules\sd\models\SdSale::className(), ['id' => 'sd_sale_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSchedules()
    {
        return $this->hasMany(\app\modules\sd\models\SdSchedule::className(), ['sd_salesitem_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdSalesitemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdSalesitemQuery(get_called_class());
    }
}
