<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmJobRequisition as BaseHrmJobRequisition;

/**
 * This is the model class for table "hrm_job_requisition".
 */
class HrmJobRequisition extends BaseHrmJobRequisition
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hrm_position_id'], 'required'],
            [['hrm_position_id'], 'integer'],
            [['requirement'], 'string'],
            [['job_requisition_code', 'job_requisition_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
