<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\Kpi as BaseKpi;

/**
 * This is the model class for table "kpi".
 */
class Kpi extends BaseKpi
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
