<?php

namespace app\models;

use Yii;
use \app\models\base\Personnelstructure as BasePersonnelstructure;

/**
 * This is the model class for table "personnelstructure".
 */
class Personnelstructure extends BasePersonnelstructure
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'positions_id', 'employeegroup_id', 'employeesubgroup_id'], 'required'],
            [['id', 'positions_id', 'employeegroup_id', 'employeesubgroup_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
