<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employeehasskill".
 *
 * @property integer $employee_id
 * @property integer $skill_id
 * @property integer $how_many
 * @property integer $how_long
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee $employee
 * @property \app\models\Skill $skill
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
            'employee_id' => 'Employee ID',
            'skill_id' => 'Skill ID',
            'how_many' => 'How Many',
            'how_long' => 'How Long',
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
    public function getSkill()
    {
        return $this->hasOne(\app\models\Skill::className(), ['id' => 'skill_id']);
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
     * @return \app\models\EmployeehasskillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmployeehasskillQuery(get_called_class());
    }
}
