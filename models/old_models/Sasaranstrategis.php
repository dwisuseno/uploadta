<?php

namespace app\models;

use Yii;
use \app\models\base\Sasaranstrategis as BaseSasaranstrategis;

/**
 * This is the model class for table "sasaranstrategis".
 */
class Sasaranstrategis extends BaseSasaranstrategis
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hrdata_id', 'employee_id', 'kra_id'], 'required'],
            [['id', 'hrdata_id', 'employee_id', 'kra_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
