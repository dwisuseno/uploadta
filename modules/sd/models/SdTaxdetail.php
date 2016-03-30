<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdTaxdetail as BaseSdTaxdetail;

/**
 * This is the model class for table "sd_taxdetail".
 */
class SdTaxdetail extends BaseSdTaxdetail
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
[
            [['value_taxdetail', 'tax_id', 'currency_id', 'sd_sale_id'], 'integer'],
            [['name_taxdetail', 'country_taxdetail'], 'string', 'max' => 45]
                ]);
    }
	
}
