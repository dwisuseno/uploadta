<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "workexp".
 *
 * @property integer $id
 * @property integer $workingexp
 * @property integer $bonus
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Salary[] $salaries
 */
class Workexp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workexp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'workingexp' => 'Workingexp',
            'bonus' => 'Bonus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\app\models\Salary::className(), ['workexp_id' => 'id']);
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
     * @return \app\models\WorkexpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\WorkexpQuery(get_called_class());
    }
}
