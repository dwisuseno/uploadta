<?php

namespace app\models;

use Yii;
use \app\models\base\Kpi as BaseKpi;

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
            [['id', 'sasaranstrategis_id', 'kpitype_id'], 'required'],
            [['id', 'sasaranstrategis_id', 'kpitype_id'], 'integer'],
            [['weight', 'target', 'realisasi', 'skor', 'final_skor'], 'number'],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
