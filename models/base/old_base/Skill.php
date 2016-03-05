<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "skill".
 *
 * @property integer $id
 * @property string $skill_code
 * @property string $skill_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employeehasskill[] $employeehasskills
 * @property \app\models\Employee[] $employees
 */
class Skill extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_code' => 'Skill Code',
            'skill_name' => 'Skill Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehasskills()
    {
        return $this->hasMany(\app\models\Employeehasskill::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\models\Employee::className(), ['id' => 'employee_id'])->viaTable('employeehasskill', ['skill_id' => 'id']);
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
     * @return \app\models\SkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SkillQuery(get_called_class());
    }
}
