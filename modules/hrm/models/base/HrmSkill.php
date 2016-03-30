<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_skill".
 *
 * @property integer $id
 * @property integer $level_id
 * @property string $skill_code
 * @property string $skill_name
 * @property string $detail_skill
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmLevel $level
 */
class HrmSkill extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_skill';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_id' => 'Level ID',
            'skill_code' => 'Skill Code',
            'skill_name' => 'Skill Name',
            'detail_skill' => 'Detail Skill',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmLevel::className(), ['id' => 'level_id']);
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
     * @return \app\modules\hrm\models\HrmSkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmSkillQuery(get_called_class());
    }
}
