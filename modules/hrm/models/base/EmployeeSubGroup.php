<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employee_sub_group".
 *
 * @property integer $id
 * @property integer $employee_group_id
 * @property string $employeesubgroup_code
 * @property string $employeesubgroup_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\EmployeeGroup $employeeGroup
 */
class EmployeeSubGroup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_sub_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_group_id' => 'Employee Group ID',
            'employeesubgroup_code' => 'Employeesubgroup Code',
            'employeesubgroup_name' => 'Employeesubgroup Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeGroup()
    {
        return $this->hasOne(\app\modules\hrm\models\EmployeeGroup::className(), ['id' => 'employee_group_id']);
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
     * @return \app\modules\hrm\models\EmployeeSubGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\EmployeeSubGroupQuery(get_called_class());
    }
}
