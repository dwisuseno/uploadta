<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "jobs".
 *
 * @property integer $id
 * @property string $jobs_code
 * @property string $jobs_detail
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Positions[] $positions
 */
class Jobs extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs';
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
    public function getPositions()
    {
        return $this->hasMany(\app\models\Positions::className(), ['jobs_id' => 'id']);
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
     * @return \app\models\JobsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\JobsQuery(get_called_class());
    }
}
