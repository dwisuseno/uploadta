<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "gl_bank".
 *
 * @property integer $id
 * @property string $name_bank
 * @property string $city_bank
 * @property integer $country_id
 *
 * @property \app\modules\sd\models\Country $country
 * @property \app\modules\sd\models\SdCustomeraccount[] $sdCustomeraccounts
 */
class GlBank extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl_bank';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_bank' => 'Name Bank',
            'city_bank' => 'City Bank',
            'country_id' => 'Country ID',
        ];
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
    public function getSdCustomeraccounts()
    {
        return $this->hasMany(\app\modules\sd\models\SdCustomeraccount::className(), ['gl_bank_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\GlBankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\GlBankQuery(get_called_class());
    }
}
