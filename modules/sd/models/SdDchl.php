<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdDchl as BaseSdDchl;

/**
 * This is the model class for table "sd_dchl".
 */
class SdDchl extends BaseSdDchl
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['code_dchl'], 'string', 'max' => 45],
            [['name_dchl'], 'string', 'max' => 100]
        ];
    }
	
}
