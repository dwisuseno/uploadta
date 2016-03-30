<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmSalary as BaseHrmSalary;

/**
 * This is the model class for table "hrm_salary".
 */
class HrmSalary extends BaseHrmSalary
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'familyallowance_id', 'workexp_id'], 'required'],
            [['employee_id', 'wage', 'loss', 'salary', 'familyallowance_id', 'workexp_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
