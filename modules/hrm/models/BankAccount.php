<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\BankAccount as BaseBankAccount;

/**
 * This is the model class for table "bank_account".
 */
class BankAccount extends BaseBankAccount
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bankaccount_name', 'bankaccount_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
