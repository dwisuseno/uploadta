<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_strategic_target".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $strategic_target_code
 * @property string $strategic_target_detail
 * @property string $period
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmKeyResultArea[] $hrmKeyResultAreas
 * @property \app\modules\hrm\models\HrmEmployee $employee
 */
class HrmStrategicTarget extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_strategic_target';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'strategic_target_code' => 'Strategic Target Code',
            'strategic_target_detail' => 'Strategic Target Detail',
            'period' => 'Period',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmKeyResultAreas()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmKeyResultArea::className(), ['sasaran_strategis_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmStrategicTargetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmStrategicTargetQuery(get_called_class());
    }
}
