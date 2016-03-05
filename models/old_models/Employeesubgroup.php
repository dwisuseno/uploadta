<?php

namespace app\models;

use Yii;
use \app\models\base\Employeesubgroup as BaseEmployeesubgroup;

/**
 * This is the model class for table "employeesubgroup".
 */
class Employeesubgroup extends BaseEmployeesubgroup
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeesubgroup_code', 'employeesubgroup_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
