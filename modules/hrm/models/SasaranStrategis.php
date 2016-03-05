<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\SasaranStrategis as BaseSasaranStrategis;

/**
 * This is the model class for table "sasaran_strategis".
 */
class SasaranStrategis extends BaseSasaranStrategis
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id'], 'integer'],
            [['sasaran_strategis_detail'], 'string'],
            [['period'], 'safe'],
            [['sasaranstrategis_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
