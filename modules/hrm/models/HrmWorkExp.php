<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmWorkExp as BaseHrmWorkExp;

/**
 * This is the model class for table "hrm_work_exp".
 */
class HrmWorkExp extends BaseHrmWorkExp
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
