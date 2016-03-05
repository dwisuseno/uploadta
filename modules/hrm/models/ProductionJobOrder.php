<?php

namespace app\modules\hrm\models;

use Yii;
use \app\modules\hrm\models\base\ProductionJobOrder as BaseProductionJobOrder;

/**
 * This is the model class for table "production_job_order".
 */
class ProductionJobOrder extends BaseProductionJobOrder
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operation_id', 'machine_id', 'employee_id', 'quantity_produced'], 'integer'],
            [['start_planning', 'end_planning', 'start_real', 'end_real'], 'safe'],
            [['planning_duration', 'real_duration', 'time_per_production'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
	
}
