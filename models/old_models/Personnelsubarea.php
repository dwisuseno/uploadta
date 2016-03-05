<?php

namespace app\models;

use Yii;
use \app\models\base\Personnelsubarea as BasePersonnelsubarea;

/**
 * This is the model class for table "personnelsubarea".
 */
class Personnelsubarea extends BasePersonnelsubarea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['personnel_subarea_code', 'personnel_subarea_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
