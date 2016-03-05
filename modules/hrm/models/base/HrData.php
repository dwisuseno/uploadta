<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hr_data".
 *
 * @property integer $id
 * @property integer $bank_account_id
 * @property string $personnelnumber
 * @property string $date_of_birth
 * @property string $language
 * @property string $nationality
 * @property string $marital_status
 * @property integer $children
 * @property integer $employee_id
 * @property string $valid_from
 * @property string $valid_to
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee $employee
 * @property \app\modules\hrm\models\BankAccount $bankAccount
 */
class HrData extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_account_id' => 'Bank Account ID',
            'personnelnumber' => 'Personnelnumber',
            'date_of_birth' => 'Date Of Birth',
            'language' => 'Language',
            'nationality' => 'Nationality',
            'marital_status' => 'Marital Status',
            'children' => 'Children',
            'employee_id' => 'Employee ID',
            'valid_from' => 'Valid From',
            'valid_to' => 'Valid To',
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
    public function getBankAccount()
    {
        return $this->hasOne(\app\modules\hrm\models\BankAccount::className(), ['id' => 'bank_account_id']);
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
     * @return \app\modules\hrm\models\HrDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrDataQuery(get_called_class());
    }
}
