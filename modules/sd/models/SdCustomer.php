<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdCustomer as BaseSdCustomer;

/**
 * This is the model class for table "sd_customer".
 */
class SdCustomer extends BaseSdCustomer
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_customer', 'pay_customer', 'delivprior_customer', 'comment_customer'], 'string'],
            [['probability_customer', 'sd_salesarea_id', 'ar_payterm_id', 'sd_cp_id', 'sd_ship_id', 'currency_id', 'ar_dunning_id', 'country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_customer', 'postal_customer', 'city_customer'], 'string', 'max' => 45],
            [['name_customer'], 'string', 'max' => 100],
            [['street_customer'], 'string', 'max' => 255],
            [['pb_customer', 'telp_customer', 'mobile_customer'], 'string', 'max' => 20],
            [['telpext_customer'], 'string', 'max' => 10],
            [['email_customer'], 'string', 'max' => 50]
        ];
    }
	
}
