<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmPersonnelSubArea as BaseHrmPersonnelSubArea;

/**
 * This is the model class for table "hrm_personnel_sub_area".
 */
class HrmPersonnelSubArea extends BaseHrmPersonnelSubArea
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
