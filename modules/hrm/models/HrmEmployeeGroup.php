<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmEmployeeGroup as BaseHrmEmployeeGroup;

/**
 * This is the model class for table "hrm_employee_group".
 */
class HrmEmployeeGroup extends BaseHrmEmployeeGroup
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
