<?php

namespace app\models;

use Yii;
use \app\models\base\Personnelarea as BasePersonnelarea;

/**
 * This is the model class for table "personnelarea".
 */
class Personnelarea extends BasePersonnelarea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['personnelarea_code', 'personnelarea_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
