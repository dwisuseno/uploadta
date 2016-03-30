<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmShift as BaseHrmShift;

/**
 * This is the model class for table "hrm_shift".
 */
class HrmShift extends BaseHrmShift
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'safe'],
            [['shift_code', 'shift_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
