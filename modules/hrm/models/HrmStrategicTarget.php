<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmStrategicTarget as BaseHrmStrategicTarget;

/**
 * This is the model class for table "hrm_strategic_target".
 */
class HrmStrategicTarget extends BaseHrmStrategicTarget
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id'], 'integer'],
            [['strategic_target_detail'], 'string'],
            [['period'], 'safe'],
            [['strategic_target_code', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
