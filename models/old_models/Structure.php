<?php

namespace app\models;

use Yii;
use \app\models\base\Structure as BaseStructure;

/**
 * This is the model class for table "structure".
 */
class Structure extends BaseStructure
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'employeegroup_id', 'employeesubgroup_id'], 'required'],
            [['id', 'client_id', 'employeegroup_id', 'employeesubgroup_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 50],
            [['id'], 'unique']
        ];
    }
	
}
