<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmLevel as BaseHrmLevel;

/**
 * This is the model class for table "hrm_level".
 */
class HrmLevel extends BaseHrmLevel
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_code', 'level_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
