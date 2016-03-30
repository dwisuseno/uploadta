<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmKeyResultArea as BaseHrmKeyResultArea;

/**
 * This is the model class for table "hrm_key_result_area".
 */
class HrmKeyResultArea extends BaseHrmKeyResultArea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sasaran_strategis_id'], 'required'],
            [['sasaran_strategis_id'], 'integer'],
            [['key_result_area'], 'string'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
