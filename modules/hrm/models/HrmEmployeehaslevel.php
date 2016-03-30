<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmEmployeehaslevel as BaseHrmEmployeehaslevel;

/**
 * This is the model class for table "hrm_employeehaslevel".
 */
class HrmEmployeehaslevel extends BaseHrmEmployeehaslevel
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'level_id'], 'required'],
            [['employee_id', 'level_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
