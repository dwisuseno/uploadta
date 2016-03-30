<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_customeraccount".
 *
 * @property integer $id
 * @property string $city_bank
 * @property string $country_bank
 * @property string $key_bank
 * @property string $account_bank
 * @property string $holder_customeraccount
 * @property integer $gl_bank_id
 * @property integer $sd_customer_id
 *
 * @property \app\modules\sd\models\GlBank $glBank
 * @property \app\modules\sd\models\SdCustomer $sdCustomer
 */
class SdCustomeraccount extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_customeraccount';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_bank' => 'City Bank',
            'country_bank' => 'Country Bank',
            'key_bank' => 'Key Bank',
            'account_bank' => 'Account Bank',
            'holder_customeraccount' => 'Holder Customeraccount',
            'gl_bank_id' => 'Gl Bank ID',
            'sd_customer_id' => 'Sd Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlBank()
    {
        return $this->hasOne(\app\modules\sd\models\GlBank::className(), ['id' => 'gl_bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCustomer()
    {
        return $this->hasOne(\app\modules\sd\models\SdCustomer::className(), ['id' => 'sd_customer_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdCustomeraccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdCustomeraccountQuery(get_called_class());
    }
}
