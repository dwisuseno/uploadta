<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\KpiType as BaseKpiType;

/**
 * This is the model class for table "kpi_type".
 */
class KpiType extends BaseKpiType
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_code', 'kpi_type_name', 'created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
