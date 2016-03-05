<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Company as BaseCompany;

/**
 * This is the model class for table "company".
 */
class Company extends BaseCompany
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['company_code', 'company_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
