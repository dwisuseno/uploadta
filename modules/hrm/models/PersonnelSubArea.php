<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\PersonnelSubArea as BasePersonnelSubArea;

/**
 * This is the model class for table "personnel_sub_area".
 */
class PersonnelSubArea extends BasePersonnelSubArea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personnel_area_id'], 'required'],
            [['personnel_area_id'], 'integer'],
            [['personnel_subarea_code', 'personnel_subarea_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
