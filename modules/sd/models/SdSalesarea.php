<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSalesarea as BaseSdSalesarea;

/**
 * This is the model class for table "sd_salesarea".
 */
class SdSalesarea extends BaseSdSalesarea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sd_salesorg_id', 'sd_division_id', 'sd_dchl_id', 'company_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_salesarea', 'status_salesarea'], 'string', 'max' => 45]
        ];
    }
	
}
