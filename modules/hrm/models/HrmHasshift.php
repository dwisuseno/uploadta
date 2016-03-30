<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmHasshift as BaseHrmHasshift;

/**
 * This is the model class for table "hrm_hasshift".
 */
class HrmHasshift extends BaseHrmHasshift
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'shift_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
