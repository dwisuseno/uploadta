<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "payroll".
 *
 * @property integer $id
 * @property string $payroll_code
 * @property integer $employee_id
 * @property integer $salary_amount
 * @property string $date
 * @property string $payroll_status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee $employee
 */
class Payroll extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payroll_code' => 'Payroll Code',
            'employee_id' => 'Employee ID',
            'salary_amount' => 'Salary Amount',
            'date' => 'Date',
            'payroll_status' => 'Payroll Status',
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
     * @return \app\modules\hrm\models\PayrollQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\PayrollQuery(get_called_class());
    }
}
