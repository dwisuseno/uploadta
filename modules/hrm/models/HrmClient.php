<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmClient as BaseHrmClient;

/**
 * This is the model class for table "hrm_client".
 */
class HrmClient extends BaseHrmClient
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_code'], 'string', 'max' => 255],
            [['client_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
