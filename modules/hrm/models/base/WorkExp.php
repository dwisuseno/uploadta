<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "work_exp".
 *
 * @property integer $id
 * @property integer $working_exp
 * @property integer $bonus
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Salary[] $salaries
 */
class WorkExp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_exp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'working_exp' => 'Working Exp',
            'bonus' => 'Bonus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\app\modules\hrm\models\Salary::className(), ['workexp_id' => 'id']);
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
     * @return \app\modules\hrm\models\WorkExpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\WorkExpQuery(get_called_class());
    }
}
