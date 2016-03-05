<?php

namespace app\models;

use Yii;
use \app\models\base\Bankaccount as BaseBankaccount;

/**
 * This is the model class for table "bankaccount".
 */
class Bankaccount extends BaseBankaccount
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['bankaccount_name', 'bankaccount_number', 'bankaccount_own'], 'string', 'max' => 45],
            [['created_at'], 'string', 'max' => 50],
            [['updated_at'], 'string', 'max' => 255]
        ];
    }
	
}
