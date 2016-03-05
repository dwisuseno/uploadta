<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "bank_account".
 *
 * @property integer $id
 * @property string $bankaccount_name
 * @property string $bankaccount_code
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Employee[] $employees
 */
class BankAccount extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_account';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bankaccount_name' => 'Bankaccount Name',
            'bankaccount_code' => 'Bankaccount Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\modules\hrm\models\Employee::className(), ['bank_account_id' => 'id']);
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
     * @return \app\modules\hrm\models\BankAccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\BankAccountQuery(get_called_class());
    }
}
