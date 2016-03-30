<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_level".
 *
 * @property integer $id
 * @property string $level_code
 * @property string $level_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployeehaslevel[] $hrmEmployeehaslevels
 * @property \app\modules\hrm\models\HrmSkill[] $hrmSkills
 */
class HrmLevel extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_level';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_code' => 'Level Code',
            'level_name' => 'Level Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployeehaslevels()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployeehaslevel::className(), ['level_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmSkills()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmSkill::className(), ['level_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmLevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmLevelQuery(get_called_class());
    }
}
