<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_position".
 *
 * @property integer $id
 * @property integer $jobs_id
 * @property string $positions_code
 * @property string $vacancy
 * @property integer $employee_id
 * @property string $positions_as
 * @property integer $basic_salary
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployeeGroup[] $hrmEmployeeGroups
 * @property \app\modules\hrm\models\HrmEmployee $employee
 * @property \app\modules\hrm\models\HrmJob $jobs
 */
class HrmPosition extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_position';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jobs_id' => 'Jobs ID',
            'positions_code' => 'Positions Code',
            'vacancy' => 'Vacancy',
            'employee_id' => 'Employee ID',
            'positions_as' => 'Positions As',
            'basic_salary' => 'Basic Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployeeGroups()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployeeGroup::className(), ['positions_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmEmployee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmJob::className(), ['id' => 'jobs_id']);
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
     * @return \app\modules\hrm\models\HrmPositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmPositionQuery(get_called_class());
    }
}
