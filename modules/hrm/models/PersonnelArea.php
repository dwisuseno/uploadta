<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\PersonnelArea as BasePersonnelArea;

/**
 * This is the model class for table "personnel_area".
 */
class PersonnelArea extends BasePersonnelArea
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
