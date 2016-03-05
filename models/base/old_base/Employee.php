<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employee".
 *
 * @property integer $id
 * @property string $employee_id
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $address
 * @property string $photo
 * @property integer $positions_id
 * @property string $nickname
 * @property string $start_work
 * @property string $created_at
 * @property string $updated_at
 * @property integer $orgstructure_id
 *
 * @property \app\models\Positions $positions
 * @property \app\models\Orgstructure $orgstructure
 * @property \app\models\Employeehashrdata[] $employeehashrdatas
 * @property \app\models\Hrdata[] $hrdatas
 * @property \app\models\Employeehasskill[] $employeehasskills
 * @property \app\models\Skill[] $skills
 * @property \app\models\Hrdata[] $hrdatas0
 * @property \app\models\Payroll[] $payrolls
 * @property \app\models\Salary[] $salaries
 * @property \app\models\Sasaranstrategis[] $sasaranstrategis
 */
class Employee extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'photo' => 'Photo',
            'positions_id' => 'Positions ID',
            'nickname' => 'Nickname',
            'start_work' => 'Start Work',
            'orgstructure_id' => 'Orgstructure ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasOne(\app\models\Positions::className(), ['id' => 'positions_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgstructure()
    {
        return $this->hasOne(\app\models\Orgstructure::className(), ['id' => 'orgstructure_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehashrdatas()
    {
        return $this->hasMany(\app\models\Employeehashrdata::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrdatas()
    {
        return $this->hasMany(\app\models\Hrdata::className(), ['id' => 'hrdata_id'])->viaTable('employeehashrdata', ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehasskills()
    {
        return $this->hasMany(\app\models\Employeehasskill::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(\app\models\Skill::className(), ['id' => 'skill_id'])->viaTable('employeehasskill', ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrdatas0()
    {
        return $this->hasMany(\app\models\Hrdata::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(\app\models\Payroll::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\app\models\Salary::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSasaranstrategis()
    {
        return $this->hasMany(\app\models\Sasaranstrategis::className(), ['employee_id' => 'id']);
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
     * @return \app\models\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmployeeQuery(get_called_class());
    }
}
