<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employee".
 *
 * @property integer $id
 * @property integer $personnel_sub_area_id
 * @property string $person_id
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $address
 * @property string $photo
 * @property string $nickname
 * @property string $email
 * @property string $start_work
 * @property string $last_education
 * @property string $gender
 * @property string $phone_number
 * @property string $to_work
 * @property string $status
 * @property string $personnel_number
 * @property string $date_of_birth
 * @property string $language
 * @property string $nationality
 * @property string $marital_status
 * @property integer $bank_account_id
 * @property string $bank_account_own
 * @property string $bank_account_number
 * @property string $type
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\BankAccount $bankAccount
 * @property \app\modules\hrm\models\PersonnelSubArea $personnelSubArea
 * @property \app\modules\hrm\models\Employeehasskill[] $employeehasskills
 * @property \app\modules\hrm\models\Payroll[] $payrolls
 * @property \app\modules\hrm\models\Positions[] $positions
 * @property \app\modules\hrm\models\Salary[] $salaries
 * @property \app\modules\hrm\models\SasaranStrategis[] $sasaranStrategis
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
            'personnel_sub_area_id' => 'Personnel Sub Area ID',
            'person_id' => 'Person ID',
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'photo' => 'Photo',
            'nickname' => 'Nickname',
            'email' => 'Email',
            'start_work' => 'Start Work',
            'last_education' => 'Last Education',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
            'to_work' => 'To Work',
            'status' => 'Status',
            'personnel_number' => 'Personnel Number',
            'date_of_birth' => 'Date Of Birth',
            'language' => 'Language',
            'nationality' => 'Nationality',
            'marital_status' => 'Marital Status',
            'bank_account_id' => 'Bank Account ID',
            'bank_account_own' => 'Bank Account Own',
            'bank_account_number' => 'Bank Account Number',
            'type' => 'Type',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccount()
    {
        return $this->hasOne(\app\modules\hrm\models\BankAccount::className(), ['id' => 'bank_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelSubArea()
    {
        return $this->hasOne(\app\modules\hrm\models\PersonnelSubArea::className(), ['id' => 'personnel_sub_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehasskills()
    {
        return $this->hasMany(\app\modules\hrm\models\Employeehasskill::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(\app\modules\hrm\models\Payroll::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(\app\modules\hrm\models\Positions::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\app\modules\hrm\models\Salary::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSasaranStrategis()
    {
        return $this->hasMany(\app\modules\hrm\models\SasaranStrategis::className(), ['employee_id' => 'id']);
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
     * @return \app\modules\hrm\models\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\EmployeeQuery(get_called_class());
    }
}
