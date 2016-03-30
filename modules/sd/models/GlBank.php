<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\GlBank as BaseGlBank;

/**
 * This is the model class for table "gl_bank".
 */
class GlBank extends BaseGlBank
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['name_bank', 'city_bank'], 'string', 'max' => 45]
        ];
    }
	
}
