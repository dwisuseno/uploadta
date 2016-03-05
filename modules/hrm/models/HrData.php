<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrData as BaseHrData;

/**
 * This is the model class for table "hr_data".
 */
class HrData extends BaseHrData
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_account_id', 'employee_id'], 'required'],
            [['bank_account_id', 'children', 'employee_id'], 'integer'],
            [['date_of_birth', 'valid_from', 'valid_to'], 'safe'],
            [['personnelnumber', 'language', 'nationality', 'marital_status', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
