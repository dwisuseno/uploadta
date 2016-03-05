<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Kra as BaseKra;

/**
 * This is the model class for table "kra".
 */
class Kra extends BaseKra
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tasks_id'], 'required'],
            [['tasks_id'], 'integer'],
            [['key_result_area', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
