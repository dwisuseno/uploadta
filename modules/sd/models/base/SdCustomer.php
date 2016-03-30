<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_customer".
 *
 * @property integer $id
 * @property string $code_customer
 * @property string $title_customer
 * @property string $name_customer
 * @property string $street_customer
 * @property string $postal_customer
 * @property string $city_customer
 * @property string $pay_customer
 * @property integer $probability_customer
 * @property string $delivprior_customer
 * @property string $pb_customer
 * @property string $telp_customer
 * @property string $telpext_customer
 * @property string $mobile_customer
 * @property string $email_customer
 * @property string $comment_customer
 * @property integer $sd_salesarea_id
 * @property integer $ar_payterm_id
 * @property integer $sd_cp_id
 * @property integer $sd_ship_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $currency_id
 * @property integer $ar_dunning_id
 * @property integer $country_id
 *
 * @property \app\modules\sd\models\ArDunning $arDunning
 * @property \app\modules\sd\models\ArPayterm $arPayterm
 * @property \app\modules\sd\models\Country $country
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\SdCp $sdCp
 * @property \app\modules\sd\models\SdSalesarea $sdSalesarea
 * @property \app\modules\sd\models\SdShip $sdShip
 * @property \app\modules\sd\models\SdCustomeraccount[] $sdCustomeraccounts
 * @property \app\modules\sd\models\SdSale[] $sdSales
 */
class SdCustomer extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_customer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_customer' => 'Code Customer',
            'title_customer' => 'Title Customer',
            'name_customer' => 'Name Customer',
            'street_customer' => 'Street Customer',
            'postal_customer' => 'Postal Customer',
            'city_customer' => 'City Customer',
            'pay_customer' => 'Pay Customer',
            'probability_customer' => 'Probability Customer',
            'delivprior_customer' => 'Delivprior Customer',
            'pb_customer' => 'Pb Customer',
            'telp_customer' => 'Telp Customer',
            'telpext_customer' => 'Ext',
            'mobile_customer' => 'Mobile Customer',
            'email_customer' => 'Email Customer',
            'comment_customer' => 'Comment Customer',
            'sd_salesarea_id' => 'Sd Salesarea ID',
            'ar_payterm_id' => 'Ar Payterm ID',
            'sd_cp_id' => 'Sd Cp ID',
            'sd_ship_id' => 'Sd Ship ID',
            'currency_id' => 'Currency ID',
            'ar_dunning_id' => 'Ar Dunning ID',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArDunning()
    {
        return $this->hasOne(\app\modules\ar\models\ArDunning::className(), ['id' => 'ar_dunning_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArPayterm()
    {
        return $this->hasOne(\app\modules\ar\models\ArPayterm::className(), ['id' => 'ar_payterm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(\app\modules\master\models\Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(\app\modules\master\models\Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCp()
    {
        return $this->hasOne(\app\modules\sd\models\SdCp::className(), ['id' => 'sd_cp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesarea()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalesarea::className(), ['id' => 'sd_salesarea_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShip()
    {
        return $this->hasOne(\app\modules\sd\models\SdShip::className(), ['id' => 'sd_ship_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCustomeraccounts()
    {
        return $this->hasMany(\app\modules\sd\models\SdCustomeraccount::className(), ['sd_customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_customer_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdCustomerQuery(get_called_class());
    }
}
