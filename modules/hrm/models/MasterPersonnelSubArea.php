<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\MasterPersonnelSubArea as BaseMasterPersonnelSubArea;

/**
 * This is the model class for table "master_personnel_sub_area".
 */
class MasterPersonnelSubArea extends BaseMasterPersonnelSubArea
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
