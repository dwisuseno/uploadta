<?php

namespace app\models;

use Yii;
use \app\models\base\Employee as BaseEmployee;

/**
 * This is the model class for table "employee".
 */
class Employee extends BaseEmployee
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['positions_id', 'orgstructure_id'], 'required'],
            [['positions_id', 'orgstructure_id'], 'integer'],
            [['start_work'], 'safe'],
            [['employee_id'], 'string', 'max' => 30],
            [['title', 'middle_name', 'nickname'], 'string', 'max' => 45],
            [['first_name', 'last_name'], 'string', 'max' => 40],
            [['address', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['photo'], 'string', 'max' => 100]
        ];
    }
	
}
