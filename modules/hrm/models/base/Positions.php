<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "positions".
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
 * @property \app\modules\hrm\models\EmployeeGroup[] $employeeGroups
 * @property \app\modules\hrm\models\Employee $employee
 * @property \app\modules\hrm\models\Jobs $jobs
 */
class Positions extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'positions';
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
    public function getEmployeeGroups()
    {
        return $this->hasMany(\app\modules\hrm\models\EmployeeGroup::className(), ['positions_id' => 'id']);
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
    public function getJobs()
    {
        return $this->hasOne(\app\modules\hrm\models\Jobs::className(), ['id' => 'jobs_id']);
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
     * @return \app\modules\hrm\models\PositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\PositionsQuery(get_called_class());
    }
}
