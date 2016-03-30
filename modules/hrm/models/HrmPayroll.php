<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmPayroll as BaseHrmPayroll;

/**
 * This is the model class for table "hrm_payroll".
 */
class HrmPayroll extends BaseHrmPayroll
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id', 'salary_amount'], 'integer'],
            [['date'], 'safe'],
            [['payroll_status'], 'string'],
            [['payroll_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
