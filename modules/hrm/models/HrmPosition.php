<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmPosition as BaseHrmPosition;

/**
 * This is the model class for table "hrm_position".
 */
class HrmPosition extends BaseHrmPosition
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobs_id', 'employee_id'], 'required'],
            [['jobs_id', 'employee_id', 'basic_salary'], 'integer'],
            [['vacancy', 'positions_as'], 'string'],
            [['positions_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
