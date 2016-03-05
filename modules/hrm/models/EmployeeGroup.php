<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\EmployeeGroup as BaseEmployeeGroup;

/**
 * This is the model class for table "employee_group".
 */
class EmployeeGroup extends BaseEmployeeGroup
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['positions_id'], 'required'],
            [['positions_id'], 'integer'],
            [['employeegroup_code', 'employeegroup_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
