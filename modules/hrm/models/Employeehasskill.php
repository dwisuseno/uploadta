<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Employeehasskill as BaseEmployeehasskill;

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
            [['employee_id', 'sub_skill_id'], 'required'],
            [['employee_id', 'sub_skill_id', 'how_many', 'how_long'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
