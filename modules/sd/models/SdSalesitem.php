<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSalesitem as BaseSdSalesitem;

/**
 * This is the model class for table "sd_salesitem".
 */
class SdSalesitem extends BaseSdSalesitem
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
[
            [['quantity_salesitem', 'delivqty_salesitem', 'confirmqty_salesitem', 'pickqty', 'batch', 'iwm_item_master_id', 'sd_sale_id', 'currency_id'], 'integer'],
            [['price_salesitem', 'priceori_salesitem', 'linetotal_salesitem', 'weight_salesitem'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uom_salesitem'], 'string', 'max' => 45],
            [['desc_salesitem'], 'string', 'max' => 100]
                ]);
    }
	
}
