<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Jobs as BaseJobs;

/**
 * This is the model class for table "jobs".
 */
class Jobs extends BaseJobs
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
