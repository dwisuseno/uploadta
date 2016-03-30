<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmInfotype as BaseHrmInfotype;

/**
 * This is the model class for table "hrm_infotype".
 */
class HrmInfotype extends BaseHrmInfotype
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['infotype', 'infotype_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
