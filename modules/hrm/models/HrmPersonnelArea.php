<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmPersonnelArea as BaseHrmPersonnelArea;

/**
 * This is the model class for table "hrm_personnel_area".
 */
class HrmPersonnelArea extends BaseHrmPersonnelArea
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id'], 'integer'],
            [['personnelarea_code', 'personnelarea_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
