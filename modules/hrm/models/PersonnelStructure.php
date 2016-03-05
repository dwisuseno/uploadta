<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\PersonnelStructure as BasePersonnelStructure;

/**
 * This is the model class for table "personnel_structure".
 */
class PersonnelStructure extends BasePersonnelStructure
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['positions_id', 'employeegroup_id', 'employeesubgroup_id'], 'required'],
            [['positions_id', 'employeegroup_id', 'employeesubgroup_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
