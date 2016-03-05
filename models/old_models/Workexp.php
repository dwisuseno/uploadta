<?php

namespace app\models;

use Yii;
use \app\models\base\Workexp as BaseWorkexp;

/**
 * This is the model class for table "workexp".
 */
class Workexp extends BaseWorkexp
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'workingexp', 'bonus'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 50]
        ];
    }
	
}
