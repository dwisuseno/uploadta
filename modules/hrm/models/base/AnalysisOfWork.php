<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "analysis_of_work".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $sub_skill_id
 * @property double $count
 * @property double $late_time
 * @property double $on_time
 * @property double $wage
 * @property double $on_time_bonus
 * @property double $total_work_time
 * @property double $total_late_time
 * @property double $total_on_time
 * @property double $total_wage
 * @property double $total_loss
 * @property double $total_on_time_bonus
 * @property double $variance
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee $employee
 * @property \app\modules\hrm\models\SubSkill $subSkill
 */
class AnalysisOfWork extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analysis_of_work';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'sub_skill_id' => 'Sub Skill ID',
            'count' => 'Count',
            'late_time' => 'Late Time',
            'on_time' => 'On Time',
            'wage' => 'Wage',
            'on_time_bonus' => 'On Time Bonus',
            'total_work_time' => 'Total Work Time',
            'total_late_time' => 'Total Late Time',
            'total_on_time' => 'Total On Time',
            'total_wage' => 'Total Wage',
            'total_loss' => 'Total Loss',
            'total_on_time_bonus' => 'Total On Time Bonus',
            'variance' => 'Variance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSkill()
    {
        return $this->hasOne(\app\modules\hrm\models\SubSkill::className(), ['id' => 'sub_skill_id']);
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
     * @return \app\modules\hrm\models\AnalysisOfWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\AnalysisOfWorkQuery(get_called_class());
    }
}
