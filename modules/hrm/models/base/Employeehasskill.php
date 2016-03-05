<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employeehasskill".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $sub_skill_id
 * @property integer $how_many
 * @property integer $how_long
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\SubSkill $subSkill
 * @property \app\modules\hrm\models\Employee $employee
 */
class Employeehasskill extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employeehasskill';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'sub_skill_id' => 'Sub Skill ID',
            'how_many' => 'How Many',
            'how_long' => 'How Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSkill()
    {
        return $this->hasOne(\app\modules\hrm\models\SubSkill::className(), ['id' => 'sub_skill_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\Employee::className(), ['id' => 'employee_id']);
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
     * @return \app\modules\hrm\models\EmployeehasskillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\EmployeehasskillQuery(get_called_class());
    }
}
