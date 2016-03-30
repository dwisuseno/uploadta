<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmJob as BaseHrmJob;

/**
 * This is the model class for table "hrm_job".
 */
class HrmJob extends BaseHrmJob
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobs_detail'], 'string'],
            [['jobs_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
