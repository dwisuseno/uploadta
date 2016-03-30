<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_bank_account".
 *
 * @property integer $id
 * @property string $bankaccount_name
 * @property string $bankaccount_code
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployee[] $hrmEmployees
 */
class HrmBankAccount extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_bank_account';
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
    public function getHrmEmployees()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployee::className(), ['bank_account_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmBankAccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmBankAccountQuery(get_called_class());
    }
}
