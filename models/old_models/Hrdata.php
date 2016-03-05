<?php

namespace app\models;

use Yii;
use \app\models\base\Hrdata as BaseHrdata;

/**
 * This is the model class for table "hrdata".
 */
class Hrdata extends BaseHrdata
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bankaccount_id', 'employee_id'], 'required'],
            [['id', 'children', 'bankaccount_id', 'employee_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['personnelnumber', 'language', 'nationality', 'marital_status', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
