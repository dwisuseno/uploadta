<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_shiprule".
 *
 * @property integer $id
 * @property string $rule_shiprule
 * @property integer $value_shiprule
 * @property integer $sd_shipcondition_id
 * @property integer $uom_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdShipcondition $sdShipcondition
 * @property \app\modules\sd\models\Uom $uom
 */
class SdShiprule extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_shiprule';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rule_shiprule' => 'Rule Shiprule',
            'value_shiprule' => 'Value Shiprule',
            'sd_shipcondition_id' => 'Sd Shipcondition ID',
            'uom_id' => 'Uom ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShipcondition()
    {
        return $this->hasOne(\app\modules\sd\models\SdShipcondition::className(), ['id' => 'sd_shipcondition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUom()
    {
        return $this->hasOne(\app\modules\master\models\Uom::className(), ['id' => 'uom_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdShipruleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdShipruleQuery(get_called_class());
    }
}
