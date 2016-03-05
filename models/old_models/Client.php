<?php

namespace app\models;

use Yii;
use \app\models\base\Client as BaseClient;

/**
 * This is the model class for table "client".
 */
class Client extends BaseClient
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_code'], 'string', 'max' => 255],
            [['client_name'], 'string', 'max' => 45],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
