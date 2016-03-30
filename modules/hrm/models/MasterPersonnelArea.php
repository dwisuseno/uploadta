<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\MasterPersonnelArea as BaseMasterPersonnelArea;

/**
 * This is the model class for table "master_personnel_area".
 */
class MasterPersonnelArea extends BaseMasterPersonnelArea
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
