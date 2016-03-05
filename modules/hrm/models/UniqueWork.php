<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\UniqueWork as BaseUniqueWork;

/**
 * This is the model class for table "unique_work".
 */
class UniqueWork extends BaseUniqueWork
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'integer'],
            [['start_real', 'end_real'], 'safe'],
            [['duration_plan', 'duration_real'], 'number'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
