<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmBankAccount as BaseHrmBankAccount;

/**
 * This is the model class for table "hrm_bank_account".
 */
class HrmBankAccount extends BaseHrmBankAccount
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
