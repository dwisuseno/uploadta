<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrdata".
 *
 * @property integer $id
 * @property string $personnelnumber
 * @property string $date_of_birth
 * @property string $language
 * @property string $nationality
 * @property string $marital_status
 * @property integer $children
 * @property integer $bankaccount_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $employee_id
 *
 * @property \app\models\Employeehashrdata[] $employeehashrdatas
 * @property \app\models\Employee[] $employees
 * @property \app\models\Bankaccount $bankaccount
 * @property \app\models\Employee $employee
 */
class Hrdata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrdata';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personnelnumber' => 'Personnelnumber',
            'date_of_birth' => 'Date Of Birth',
            'language' => 'Language',
            'nationality' => 'Nationality',
            'marital_status' => 'Marital Status',
            'children' => 'Children',
            'bankaccount_id' => 'Bankaccount ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehashrdatas()
    {
        return $this->hasMany(\app\models\Employeehashrdata::className(), ['hrdata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\models\Employee::className(), ['id' => 'employee_id'])->viaTable('employeehashrdata', ['hrdata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankaccount()
    {
        return $this->hasOne(\app\models\Bankaccount::className(), ['id' => 'bankaccount_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\models\Employee::className(), ['id' => 'employee_id']);
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
     * @return \app\models\HrdataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\HrdataQuery(get_called_class());
    }
}
