<?php

namespace app\models;

use Yii;
use \app\models\base\Positions as BasePositions;

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
            [['vacancy', 'jobs_id'], 'integer'],
            [['jobs_id'], 'required'],
            [['positions_code', 'positions_id', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
