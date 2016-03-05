<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "sub_skill".
 *
 * @property integer $id
 * @property integer $skill_id
 * @property string $sub_skill_code
 * @property integer $level
 * @property integer $equal_to
 * @property integer $equal_time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employeehasskill[] $employeehasskills
 * @property \app\modules\hrm\models\Skill $skill
 */
class SubSkill extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_skill';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_id' => 'Skill ID',
            'sub_skill_code' => 'Sub Skill Code',
            'level' => 'Level',
            'equal_to' => 'Equal To',
            'equal_time' => 'Equal Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeehasskills()
    {
        return $this->hasMany(\app\modules\hrm\models\Employeehasskill::className(), ['sub_skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(\app\modules\hrm\models\Skill::className(), ['id' => 'skill_id']);
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
     * @return \app\modules\hrm\models\SubSkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\SubSkillQuery(get_called_class());
    }
}
