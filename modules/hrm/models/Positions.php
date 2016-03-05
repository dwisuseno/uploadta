<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Positions as BasePositions;

/**
 * This is the model class for table "positions".
 */
class Positions extends BasePositions
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
