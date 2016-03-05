<?php

namespace app\models;

use Yii;
use \app\models\base\Familyallowance as BaseFamilyallowance;

/**
 * This is the model class for table "familyallowance".
 */
class Familyallowance extends BaseFamilyallowance
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['wife', 'children'], 'number'],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
