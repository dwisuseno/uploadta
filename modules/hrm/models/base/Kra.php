<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "kra".
 *
 * @property integer $id
 * @property integer $tasks_id
 * @property string $key_result_area
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Tasks $tasks
 * @property \app\modules\hrm\models\SasaranStrategis[] $sasaranStrategis
 */
class Kra extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kra';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tasks_id' => 'Tasks ID',
            'key_result_area' => 'Key Result Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasOne(\app\modules\hrm\models\Tasks::className(), ['id' => 'tasks_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSasaranStrategis()
    {
        return $this->hasMany(\app\modules\hrm\models\SasaranStrategis::className(), ['kra_id' => 'id']);
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
     * @return \app\modules\hrm\models\KraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\KraQuery(get_called_class());
    }
}
