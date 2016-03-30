<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_detail_training".
 *
 * @property integer $id
 * @property integer $hrm_training_id
 * @property integer $hrm_employee_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmTraining $hrmTraining
 * @property \app\modules\hrm\models\HrmEmployee $hrmEmployee
 */
class HrmDetailTraining extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_detail_training';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hrm_training_id' => 'Hrm Training ID',
            'hrm_employee_id' => 'Hrm Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmTraining()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmTraining::className(), ['id' => 'hrm_training_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmEmployee::className(), ['id' => 'hrm_employee_id']);
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
     * @return \app\modules\hrm\models\HrmDetailTrainingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmDetailTrainingQuery(get_called_class());
    }
}
