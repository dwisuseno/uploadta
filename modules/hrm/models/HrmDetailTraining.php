<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmDetailTraining as BaseHrmDetailTraining;

/**
 * This is the model class for table "hrm_detail_training".
 */
class HrmDetailTraining extends BaseHrmDetailTraining
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hrm_training_id', 'hrm_employee_id'], 'required'],
            [['hrm_training_id', 'hrm_employee_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
