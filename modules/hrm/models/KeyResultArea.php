<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\KeyResultArea as BaseKeyResultArea;

/**
 * This is the model class for table "key_result_area".
 */
class KeyResultArea extends BaseKeyResultArea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sasaran_strategis_id', 'tasks_id'], 'required'],
            [['sasaran_strategis_id', 'tasks_id'], 'integer'],
            [['key_result_area'], 'string'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
