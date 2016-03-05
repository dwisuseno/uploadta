<?php

namespace app\models;

use Yii;
use \app\models\base\Employeehashrdata as BaseEmployeehashrdata;

/**
 * This is the model class for table "employeehashrdata".
 */
class Employeehashrdata extends BaseEmployeehashrdata
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'hrdata_id'], 'required'],
            [['employee_id', 'hrdata_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
