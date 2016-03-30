<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmJobreqCandidate as BaseHrmJobreqCandidate;

/**
 * This is the model class for table "hrm_jobreq_candidate".
 */
class HrmJobreqCandidate extends BaseHrmJobreqCandidate
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['candidate_id', 'job_requisition_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
