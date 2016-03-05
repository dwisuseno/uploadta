<?php

namespace app\models;

use Yii;
use \app\models\base\Employeehasskill as BaseEmployeehasskill;

/**
 * This is the model class for table "employeehasskill".
 */
class Employeehasskill extends BaseEmployeehasskill
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'skill_id'], 'required'],
            [['employee_id', 'skill_id', 'how_many', 'how_long'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
