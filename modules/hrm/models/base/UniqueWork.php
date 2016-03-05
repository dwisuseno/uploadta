<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "unique_work".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $start_real
 * @property string $end_real
 * @property double $duration_plan
 * @property double $duration_real
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee $employee
 */
class UniqueWork extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unique_work';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'start_real' => 'Start Real',
            'end_real' => 'End Real',
            'duration_plan' => 'Duration Plan',
            'duration_real' => 'Duration Real',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\Employee::className(), ['id' => 'employee_id']);
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
     * @return \app\modules\hrm\models\UniqueWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\UniqueWorkQuery(get_called_class());
    }
}
