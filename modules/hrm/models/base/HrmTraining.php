<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_training".
 *
 * @property integer $id
 * @property string $training_code
 * @property string $training_name
 * @property string $training_place
 * @property string $time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmDetailTraining[] $hrmDetailTrainings
 */
class HrmTraining extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_training';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_code' => 'Training Code',
            'training_name' => 'Training Name',
            'training_place' => 'Training Place',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmDetailTrainings()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmDetailTraining::className(), ['hrm_training_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmTrainingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmTrainingQuery(get_called_class());
    }
}
