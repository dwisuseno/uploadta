<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "personnel_structure".
 *
 * @property integer $id
 * @property integer $positions_id
 * @property integer $employeegroup_id
 * @property integer $employeesubgroup_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Positions $positions
 * @property \app\modules\hrm\models\EmployeeGroup $employeegroup
 * @property \app\modules\hrm\models\EmployeeSubGroup $employeesubgroup
 */
class PersonnelStructure extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnel_structure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'positions_id' => 'Positions ID',
            'employeegroup_id' => 'Employeegroup ID',
            'employeesubgroup_id' => 'Employeesubgroup ID',
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
    public function getEmployeegroup()
    {
        return $this->hasOne(\app\modules\hrm\models\EmployeeGroup::className(), ['id' => 'employeegroup_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeesubgroup()
    {
        return $this->hasOne(\app\modules\hrm\models\EmployeeSubGroup::className(), ['id' => 'employeesubgroup_id']);
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
     * @return \app\modules\hrm\models\PersonnelStructureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\PersonnelStructureQuery(get_called_class());
    }
}
