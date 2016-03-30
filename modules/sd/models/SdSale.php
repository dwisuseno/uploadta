<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSale as BaseSdSale;

/**
 * This is the model class for table "sd_sale".
 */
class SdSale extends BaseSdSale
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
[
            [['billto_sale', 'inquirystatus_sale', 'quotationstatus_sale', 'sostatus_sale', 'delivstatus_sale', 'sd_ship_id', 'sd_salestype_id', 'sd_shipcondition_id', 'sd_taxdetail_id', 'sd_customer_id', 'ar_payterm_id', 'currency_id', 'sd_salesarea_id'], 'integer'],
            [['net_sale', 'distance_sale', 'weight_sale', 'freightcost_sale'], 'number'],
            [['podate_sale', 'validfrom_sale', 'validto_sale', 'pricedate_sale', 'delivdate_sale', 'priceexp_sale', 'created_at', 'updated_at'], 'safe'],
            [['reject_sale', 'reasonblock_sale'], 'string'],
            [['shipto_sale'], 'string', 'max' => 255],
            [['ponumber_sale', 'inquirycode_sale', 'quotationcode_sale', 'socode_sale', 'delivcode_sale', 'billblock_sale', 'billstatus_sale', 'freightpayto_sale'], 'string', 'max' => 45]
                ]);
    }
	
}
