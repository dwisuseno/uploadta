<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_employee".
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
 * @property string $to_work
 * @property string $last_education
 * @property string $gender
 * @property string $phone_number
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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmDetailTraining[] $hrmDetailTrainings
 * @property \app\modules\hrm\models\HrmBankAccount $bankAccount
 * @property \app\modules\hrm\models\MasterPersonnelSubArea $personnelSubArea
 * @property \app\modules\hrm\models\HrmEmployeehaslevel[] $hrmEmployeehaslevels
 * @property \app\modules\hrm\models\HrmHasshift[] $hrmHasshifts
 * @property \app\modules\hrm\models\HrmPayroll[] $hrmPayrolls
 * @property \app\modules\hrm\models\HrmPosition[] $hrmPositions
 * @property \app\modules\hrm\models\HrmSalary[] $hrmSalaries
 * @property \app\modules\hrm\models\HrmWorkRecord[] $hrmWorkRecords
 */
class HrmEmployee extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_employee';
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
            'to_work' => 'To Work',
            'last_education' => 'Last Education',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
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
            'file' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmDetailTrainings()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmDetailTraining::className(), ['hrm_employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccount()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmBankAccount::className(), ['id' => 'bank_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelSubArea()
    {
        return $this->hasOne(\app\modules\hrm\models\MasterPersonnelSubArea::className(), ['id' => 'personnel_sub_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployeehaslevels()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployeehaslevel::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmHasshifts()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmHasshift::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmPayrolls()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmPayroll::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmPositions()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmPosition::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmSalaries()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmSalary::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmWorkRecords()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmWorkRecord::className(), ['employee_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmEmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmEmployeeQuery(get_called_class());
    }
}
