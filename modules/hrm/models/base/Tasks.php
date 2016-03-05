<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "tasks".
 *
 * @property integer $id
 * @property integer $kpi_id
 * @property string $task_detail
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Kra[] $kras
 * @property \app\modules\hrm\models\Kpi $kpi
 */
class Tasks extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_id' => 'Kpi ID',
            'task_detail' => 'Task Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKras()
    {
        return $this->hasMany(\app\modules\hrm\models\Kra::className(), ['tasks_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKpi()
    {
        return $this->hasOne(\app\modules\hrm\models\Kpi::className(), ['id' => 'kpi_id']);
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
     * @return \app\modules\hrm\models\TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\TasksQuery(get_called_class());
    }
}
