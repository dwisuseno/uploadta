<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\AnalysisOfWork as BaseAnalysisOfWork;

/**
 * This is the model class for table "analysis_of_work".
 */
class AnalysisOfWork extends BaseAnalysisOfWork
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'sub_skill_id'], 'integer'],
            [['count', 'late_time', 'on_time', 'wage', 'on_time_bonus', 'total_work_time', 'total_late_time', 'total_on_time', 'total_wage', 'total_loss', 'total_on_time_bonus', 'variance'], 'number'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
