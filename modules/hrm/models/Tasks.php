<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Tasks as BaseTasks;

/**
 * This is the model class for table "tasks".
 */
class Tasks extends BaseTasks
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id'], 'required'],
            [['kpi_id'], 'integer'],
            [['task_detail'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
