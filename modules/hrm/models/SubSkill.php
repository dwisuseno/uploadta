<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\SubSkill as BaseSubSkill;

/**
 * This is the model class for table "sub_skill".
 */
class SubSkill extends BaseSubSkill
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_id'], 'required'],
            [['skill_id', 'level', 'equal_to', 'equal_time'], 'integer'],
            [['sub_skill_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
