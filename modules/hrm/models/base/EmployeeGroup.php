<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employee_group".
 *
 * @property integer $id
 * @property integer $positions_id
 * @property string $employeegroup_code
 * @property string $employeegroup_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Positions $positions
 * @property \app\modules\hrm\models\EmployeeSubGroup[] $employeeSubGroups
 */
class EmployeeGroup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'positions_id' => 'Positions ID',
            'employeegroup_code' => 'Employeegroup Code',
            'employeegroup_name' => 'Employeegroup Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasOne(\app\modules\hrm\models\Positions::className(), ['id' => 'positions_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSubGroups()
    {
        return $this->hasMany(\app\modules\hrm\models\EmployeeSubGroup::className(), ['employee_group_id' => 'id']);
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
     * @return \app\modules\hrm\models\EmployeeGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\EmployeeGroupQuery(get_called_class());
    }
}
