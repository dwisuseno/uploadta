<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Payroll as BasePayroll;

/**
 * This is the model class for table "payroll".
 */
class Payroll extends BasePayroll
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
