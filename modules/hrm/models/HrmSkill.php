<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmSkill as BaseHrmSkill;

/**
 * This is the model class for table "hrm_skill".
 */
class HrmSkill extends BaseHrmSkill
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id'], 'integer'],
            [['detail_skill'], 'string'],
            [['skill_code', 'skill_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
