<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "bankaccount".
 *
 * @property integer $id
 * @property string $bankaccount_name
 * @property string $bankaccount_number
 * @property string $bankaccount_own
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Hrdata[] $hrdatas
 */
class Bankaccount extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bankaccount';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bankaccount_name' => 'Bankaccount Name',
            'bankaccount_number' => 'Bankaccount Number',
            'bankaccount_own' => 'Bankaccount Own',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrdatas()
    {
        return $this->hasMany(\app\models\Hrdata::className(), ['bankaccount_id' => 'id']);
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
     * @return \app\models\BankaccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BankaccountQuery(get_called_class());
    }
}
