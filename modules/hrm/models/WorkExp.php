<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\WorkExp as BaseWorkExp;

/**
 * This is the model class for table "work_exp".
 */
class WorkExp extends BaseWorkExp
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['working_exp', 'bonus'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
