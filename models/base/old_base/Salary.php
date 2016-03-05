<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "salary".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $wage
 * @property integer $loss
 * @property integer $familyallowance_id
 * @property integer $workexp_id
 * @property integer $salary
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee $employee
 * @property \app\models\Familyallowance $familyallowance
 * @property \app\models\Workexp $workexp
 */
class Salary extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'wage' => 'Wage',
            'loss' => 'Loss',
            'familyallowance_id' => 'Familyallowance ID',
            'workexp_id' => 'Workexp ID',
            'salary' => 'Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\models\Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyallowance()
    {
        return $this->hasOne(\app\models\Familyallowance::className(), ['id' => 'familyallowance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkexp()
    {
        return $this->hasOne(\app\models\Workexp::className(), ['id' => 'workexp_id']);
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
     * @return \app\models\SalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SalaryQuery(get_called_class());
    }
}
