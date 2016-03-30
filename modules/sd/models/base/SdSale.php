<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_sale".
 *
 * @property integer $id
 * @property string $shipto_sale
 * @property integer $billto_sale
 * @property double $net_sale
 * @property double $distance_sale
 * @property string $ponumber_sale
 * @property string $podate_sale
 * @property double $weight_sale
 * @property string $validfrom_sale
 * @property string $validto_sale
 * @property string $pricedate_sale
 * @property string $delivdate_sale
 * @property string $reject_sale
 * @property string $priceexp_sale
 * @property integer $inquirystatus_sale
 * @property integer $quotationstatus_sale
 * @property integer $sostatus_sale
 * @property integer $delivstatus_sale
 * @property string $inquirycode_sale
 * @property string $quotationcode_sale
 * @property string $socode_sale
 * @property string $delivcode_sale
 * @property double $freightcost_sale
 * @property string $billblock_sale
 * @property string $reasonblock_sale
 * @property string $created_at
 * @property string $updated_at
 * @property string $billstatus_sale
 * @property string $freightpayto_sale
 * @property integer $sd_ship_id
 * @property integer $sd_salestype_id
 * @property integer $sd_shipcondition_id
 * @property integer $sd_taxdetail_id
 * @property integer $sd_customer_id
 * @property integer $ar_payterm_id
 * @property integer $currency_id
 * @property integer $sd_salesarea_id
 *
 * @property \app\modules\sd\models\ArTransaction[] $arTransactions
 * @property \app\modules\sd\models\SdForecast[] $sdForecasts
 * @property \app\modules\sd\models\ArPayterm $arPayterm
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\SdCustomer $sdCustomer
 * @property \app\modules\sd\models\SdSalesarea $sdSalesarea
 * @property \app\modules\sd\models\SdSalestype $sdSalestype
 * @property \app\modules\sd\models\SdShip $sdShip
 * @property \app\modules\sd\models\SdShipcondition $sdShipcondition
 * @property \app\modules\sd\models\SdTaxdetail $sdTaxdetail
 * @property \app\modules\sd\models\SdSalesitem[] $sdSalesitems
 * @property \app\modules\sd\models\SdTaxdetail[] $sdTaxdetails 
 */
class SdSale extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_sale';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shipto_sale' => 'Shipto Sale',
            'billto_sale' => 'Billto Sale',
            'net_sale' => 'Net Sale',
            'distance_sale' => 'Distance',
            'ponumber_sale' => 'Ponumber Sale',
            'podate_sale' => 'Podate Sale',
            'weight_sale' => 'Weight Sale',
            'validfrom_sale' => 'Validfrom Sale',
            'validto_sale' => 'Validto Sale',
            'pricedate_sale' => 'Pricedate Sale',
            'delivdate_sale' => 'Delivdate Sale',
            'reject_sale' => 'Reject Sale',
            'priceexp_sale' => 'Priceexp Sale',
            'inquirystatus_sale' => 'Inquirystatus Sale',
            'quotationstatus_sale' => 'Quotationstatus Sale',
            'sostatus_sale' => 'Sostatus Sale',
            'delivstatus_sale' => 'Delivstatus Sale',
            'inquirycode_sale' => 'Inquirycode Sale',
            'quotationcode_sale' => 'Quotationcode Sale',
            'socode_sale' => 'Socode Sale',
            'delivcode_sale' => 'Delivcode Sale',
            'freightcost_sale' => 'Freightcost Sale',
            'billblock_sale' => 'Billblock Sale',
            'reasonblock_sale' => 'Reasonblock Sale',
            'billstatus_sale' => 'Billstatus Sale',
            'freightpayto_sale' => 'Freightpayto Sale',
            'sd_ship_id' => 'Sd Ship ID',
            'sd_salestype_id' => 'Sd Salestype ID',
            'sd_shipcondition_id' => 'Sd Shipcondition ID',
            'sd_taxdetail_id' => 'Sd Taxdetail ID',
            'sd_customer_id' => 'Sd Customer ID',
            'ar_payterm_id' => 'Ar Payterm ID',
            'currency_id' => 'Currency',
            'sd_salesarea_id' => 'Sd Salesarea ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArTransactions()
    {
        return $this->hasMany(\app\modules\ar\models\ArTransaction::className(), ['sd_sale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdForecasts()
    {
        return $this->hasMany(\app\modules\sd\models\SdForecast::className(), ['sd_sale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArPayterm()
    {
        return $this->hasOne(\app\modules\ar\models\ArPayterm::className(), ['id' => 'ar_payterm_id']);
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
    public function getSdCustomer()
    {
        return $this->hasOne(\app\modules\sd\models\SdCustomer::className(), ['id' => 'sd_customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesarea()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalesarea::className(), ['id' => 'sd_salesarea_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalestype()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalestype::className(), ['id' => 'sd_salestype_id']);
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
    public function getSdShipcondition()
    {
        return $this->hasOne(\app\modules\sd\models\SdShipcondition::className(), ['id' => 'sd_shipcondition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdTaxdetail()
    {
        return $this->hasOne(\app\modules\sd\models\SdTaxdetail::className(), ['id' => 'sd_taxdetail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesitems()
    {
        return $this->hasMany(\app\modules\sd\models\SdSalesitem::className(), ['sd_sale_id' => 'id']);
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getSdTaxdetails() 
    { 
        return $this->hasMany(\app\modules\sd\models\SdTaxdetail::className(), ['sd_sale_id' => 'id']); 
    }


    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdSaleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdSaleQuery(get_called_class());
    }
}
