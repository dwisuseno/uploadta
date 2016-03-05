<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employeehashrdata".
 *
 * @property integer $employee_id
 * @property integer $hrdata_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee $employee
 * @property \app\models\Hrdata $hrdata
 */
class Employeehashrdata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employeehashrdata';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'hrdata_id' => 'Hrdata ID',
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
    public function getHrdata()
    {
        return $this->hasOne(\app\models\Hrdata::className(), ['id' => 'hrdata_id']);
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
     * @return \app\models\EmployeehashrdataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmployeehashrdataQuery(get_called_class());
    }
}
