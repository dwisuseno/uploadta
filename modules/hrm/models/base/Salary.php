<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "salary".
 *
 * @property integer $id
 * @property integer $wage
 * @property integer $loss
 * @property integer $salary
 * @property integer $employee_id
 * @property integer $familyallowance_id
 * @property integer $workexp_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee $employee
 * @property \app\modules\hrm\models\FamilyAllowance $familyallowance
 * @property \app\modules\hrm\models\WorkExp $workexp
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
            'wage' => 'Wage',
            'loss' => 'Loss',
            'salary' => 'Salary',
            'employee_id' => 'Employee ID',
            'familyallowance_id' => 'Familyallowance ID',
            'workexp_id' => 'Workexp ID',
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
    public function getFamilyallowance()
    {
        return $this->hasOne(\app\modules\hrm\models\FamilyAllowance::className(), ['id' => 'familyallowance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkexp()
    {
        return $this->hasOne(\app\modules\hrm\models\WorkExp::className(), ['id' => 'workexp_id']);
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
     * @return \app\modules\hrm\models\SalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\SalaryQuery(get_called_class());
    }
}
