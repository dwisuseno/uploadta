<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmCandidate as BaseHrmCandidate;

/**
 * This is the model class for table "hrm_candidate".
 */
class HrmCandidate extends BaseHrmCandidate
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['candidate_code', 'person_id', 'phone_number', 'email', 'created_at', 'updated_at'], 'string', 'max' => 45],
            [['cv', 'photo'], 'string', 'max' => 255],
            [['file'],'file'],
            [['fcv'],'file'],
            [['name'], 'string', 'max' => 90]
        ];
    }
	
}
