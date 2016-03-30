<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_job".
 *
 * @property integer $id
 * @property string $jobs_code
 * @property string $jobs_detail
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmPosition[] $hrmPositions
 */
class HrmJob extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_job';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jobs_code' => 'Jobs Code',
            'jobs_detail' => 'Jobs Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmPositions()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmPosition::className(), ['jobs_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmJobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmJobQuery(get_called_class());
    }
}
