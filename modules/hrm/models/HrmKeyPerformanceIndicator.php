<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\HrmKeyPerformanceIndicator as BaseHrmKeyPerformanceIndicator;

/**
 * This is the model class for table "hrm_key_performance_indicator".
 */
class HrmKeyPerformanceIndicator extends BaseHrmKeyPerformanceIndicator
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key_result_area_id'], 'required'],
            [['key_result_area_id'], 'integer'],
            [['kpi_detail'], 'string'],
            [['weight', 'target', 'realisasi', 'skor', 'final_skor'], 'number'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
