<?php

namespace app\models;

use Yii;
use \app\models\base\Kpitype as BaseKpitype;

/**
 * This is the model class for table "kpitype".
 */
class Kpitype extends BaseKpitype
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['kpi_code', 'kpi_type_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
