<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmFamilyAllowance as BaseHrmFamilyAllowance;

/**
 * This is the model class for table "hrm_family_allowance".
 */
class HrmFamilyAllowance extends BaseHrmFamilyAllowance
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['load'], 'number'],
            [['load_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
