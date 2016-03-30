<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_shipcondition".
 *
 * @property integer $id
 * @property string $code_shipcondition
 * @property string $desc_shipcondition
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdSale[] $sdSales
 * @property \app\modules\sd\models\SdShiprule[] $sdShiprules
 */
class SdShipcondition extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_shipcondition';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_shipcondition' => 'Code Shipcondition',
            'desc_shipcondition' => 'Desc Shipcondition',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_shipcondition_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShiprules()
    {
        return $this->hasMany(\app\modules\sd\models\SdShiprule::className(), ['sd_shipcondition_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdShipconditionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdShipconditionQuery(get_called_class());
    }
}
