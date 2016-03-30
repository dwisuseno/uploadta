<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_salestype".
 *
 * @property integer $id
 * @property string $code_salestype
 * @property string $desc_salestype
 *
 * @property \app\modules\sd\models\SdSale[] $sdSales
 */
class SdSalestype extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_salestype';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_salestype' => 'Code Salestype',
            'desc_salestype' => 'Desc Salestype',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_salestype_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdSalestypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdSalestypeQuery(get_called_class());
    }
}
