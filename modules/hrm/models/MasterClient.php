<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\MasterClient as BaseMasterClient;

/**
 * This is the model class for table "master_client".
 */
class MasterClient extends BaseMasterClient
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
