<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_price".
 *
 * @property integer $id
 * @property string $code_price
 * @property string $name_price
 * @property integer $amount_price
 * @property string $created_at
 * @property string $updated_at
 * @property integer $currency_id
 *
 * @property \app\modules\sd\models\Currency $currency
 * @property \app\modules\sd\models\SdPricedetail[] $sdPricedetails
 */
class SdPrice extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_price';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_price' => 'Code Price',
            'name_price' => 'Name Price',
            'amount_price' => 'Amount Price',
            'currency_id' => 'Currency ID',
        ];
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
    public function getSdPricedetails()
    {
        return $this->hasMany(\app\modules\sd\models\SdPricedetail::className(), ['sd_price_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdPriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdPriceQuery(get_called_class());
    }
}
