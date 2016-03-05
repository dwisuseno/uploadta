<?php

namespace app\models;

use Yii;
use \app\models\base\Salary as BaseSalary;

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
            [['id', 'familyallowance_id', 'workexp_id'], 'required'],
            [['id', 'employee_id', 'wage', 'loss', 'familyallowance_id', 'workexp_id', 'salary'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
