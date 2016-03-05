<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Salary as BaseSalary;

/**
 * This is the model class for table "salary".
 */
class Salary extends BaseSalary
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wage', 'loss', 'salary', 'employee_id', 'familyallowance_id', 'workexp_id'], 'integer'],
            [['employee_id', 'familyallowance_id', 'workexp_id'], 'required'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
