<?php

namespace app\models;

use Yii;
use \app\models\base\Company as BaseCompany;

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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['company_code', 'company_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
