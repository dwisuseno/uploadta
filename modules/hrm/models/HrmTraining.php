<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmTraining as BaseHrmTraining;

/**
 * This is the model class for table "hrm_training".
 */
class HrmTraining extends BaseHrmTraining
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['training_code', 'training_name', 'training_place', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
