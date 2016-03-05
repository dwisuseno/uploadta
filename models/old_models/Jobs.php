<?php

namespace app\models;

use Yii;
use \app\models\base\Jobs as BaseJobs;

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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['jobs_code', 'jobs_detail'], 'string', 'max' => 45],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
