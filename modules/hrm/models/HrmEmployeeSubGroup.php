<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmEmployeeSubGroup as BaseHrmEmployeeSubGroup;

/**
 * This is the model class for table "hrm_employee_sub_group".
 */
class HrmEmployeeSubGroup extends BaseHrmEmployeeSubGroup
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
