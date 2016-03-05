<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "familyallowance".
 *
 * @property integer $id
 * @property double $wife
 * @property double $children
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Salary[] $salaries
 */
class Familyallowance extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'familyallowance';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wife' => 'Wife',
            'children' => 'Children',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\app\models\Salary::className(), ['familyallowance_id' => 'id']);
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
     * @return \app\models\FamilyallowanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\FamilyallowanceQuery(get_called_class());
    }
}
