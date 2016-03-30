<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_employee_group".
 *
 * @property integer $id
 * @property integer $positions_id
 * @property string $employeegroup_code
 * @property string $employeegroup_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmPosition $positions
 * @property \app\modules\hrm\models\HrmEmployeeSubGroup[] $hrmEmployeeSubGroups
 */
class HrmEmployeeGroup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_employee_group';
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
        return $this->hasOne(\app\modules\hrm\models\HrmPosition::className(), ['id' => 'positions_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployeeSubGroups()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployeeSubGroup::className(), ['employee_group_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmEmployeeGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmEmployeeGroupQuery(get_called_class());
    }
}
