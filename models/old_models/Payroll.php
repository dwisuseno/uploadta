<?php

namespace app\models;

use Yii;
use \app\models\base\Payroll as BasePayroll;

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
            [['id', 'employee_id'], 'required'],
            [['id', 'employee_id'], 'integer'],
            [['payroll_code'], 'string', 'max' => 45],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
