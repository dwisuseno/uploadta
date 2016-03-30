<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "pp_production_job_order".
 *
 * @property integer $id
 * @property integer $operation_id
 * @property integer $machine_id
 * @property integer $employee_id
 * @property string $start_planning
 * @property string $end_planning
 * @property string $start_real
 * @property string $end_real
 * @property string $planning_duration
 * @property string $real_duration
 * @property integer $quantity_produced
 * @property string $time_per_production
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployee $employee
 */
class PpProductionJobOrder extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pp_production_job_order';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operation_id' => 'Operation ID',
            'machine_id' => 'Machine ID',
            'employee_id' => 'Employee ID',
            'start_planning' => 'Start Planning',
            'end_planning' => 'End Planning',
            'start_real' => 'Start Real',
            'end_real' => 'End Real',
            'planning_duration' => 'Planning Duration',
            'real_duration' => 'Real Duration',
            'quantity_produced' => 'Quantity Produced',
            'time_per_production' => 'Time Per Production',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmEmployee::className(), ['id' => 'employee_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\hrm\models\PpProductionJobOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\PpProductionJobOrderQuery(get_called_class());
    }
}
