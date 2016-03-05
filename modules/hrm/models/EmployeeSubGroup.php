<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\EmployeeSubGroup as BaseEmployeeSubGroup;

/**
 * This is the model class for table "employee_sub_group".
 */
class EmployeeSubGroup extends BaseEmployeeSubGroup
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_group_id'], 'required'],
            [['employee_group_id'], 'integer'],
            [['employeesubgroup_code', 'employeesubgroup_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
