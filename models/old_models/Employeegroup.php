<?php

namespace app\models;

use Yii;
use \app\models\base\Employeegroup as BaseEmployeegroup;

/**
 * This is the model class for table "employeegroup".
 */
class Employeegroup extends BaseEmployeegroup
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeegroup_code', 'employeegroup_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
