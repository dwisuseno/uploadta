<?php

namespace app\models;

use Yii;
use \app\models\base\Skill as BaseSkill;

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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['skill_code', 'skill_name'], 'string', 'max' => 45],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
