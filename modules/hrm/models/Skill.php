<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Skill as BaseSkill;

/**
 * This is the model class for table "skill".
 */
class Skill extends BaseSkill
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_code', 'skill_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
