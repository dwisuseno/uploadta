<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\FamilyAllowance as BaseFamilyAllowance;

/**
 * This is the model class for table "family_allowance".
 */
class FamilyAllowance extends BaseFamilyAllowance
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
