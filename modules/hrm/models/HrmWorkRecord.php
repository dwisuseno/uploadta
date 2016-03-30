<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmWorkRecord as BaseHrmWorkRecord;

/**
 * This is the model class for table "hrm_work_record".
 */
class HrmWorkRecord extends BaseHrmWorkRecord
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id'], 'required'],
            [['id', 'employee_id', 'duration_plan', 'duration_real'], 'integer'],
            [['start_real', 'end_real'], 'safe'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
