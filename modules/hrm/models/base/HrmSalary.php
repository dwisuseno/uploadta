<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_salary".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $wage
 * @property integer $loss
 * @property integer $salary
 * @property integer $familyallowance_id
 * @property integer $workexp_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployee $employee
 * @property \app\modules\hrm\models\HrmFamilyAllowance $familyallowance
 * @property \app\modules\hrm\models\HrmWorkExp $workexp
 */
class HrmSalary extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_salary';
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
            'salary' => 'Salary',
            'familyallowance_id' => 'Familyallowance ID',
            'workexp_id' => 'Workexp ID',
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
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyallowance()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmFamilyAllowance::className(), ['id' => 'familyallowance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkexp()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmWorkExp::className(), ['id' => 'workexp_id']);
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
     * @return \app\modules\hrm\models\HrmSalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmSalaryQuery(get_called_class());
    }
}
