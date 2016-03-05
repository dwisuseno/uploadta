<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Employee as BaseEmployee;

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
            [['personnel_sub_area_id', 'bank_account_id'], 'required'],
            [['personnel_sub_area_id', 'bank_account_id'], 'integer'],
            [['title', 'address', 'gender', 'status', 'marital_status', 'type'], 'string'],
            [['start_work', 'to_work', 'date_of_birth'], 'safe'],
            [['person_id'], 'string', 'max' => 30],
            [['first_name', 'last_name'], 'string', 'max' => 40],
            [['middle_name', 'photo', 'nickname', 'email', 'personnel_number', 'language', 'nationality', 'bank_account_own', 'bank_account_number', 'password'], 'string', 'max' => 45],
            [['last_education'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 15],
            [['created_at', 'updated_at'], 'string', 'max' => 50],
            [['personnel_number'], 'unique'],
            [['person_id'], 'unique']
        ];
    }
	
}