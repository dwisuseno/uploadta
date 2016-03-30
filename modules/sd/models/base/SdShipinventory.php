<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_shipinventory".
 *
 * @property integer $id
 * @property string $code_shipinventory
 * @property string $name_shipinventory
 * @property integer $cap_shipinventory
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdShipdetail[] $sdShipdetails
 */
class SdShipinventory extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_shipinventory';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_shipinventory' => 'Code Shipinventory',
            'name_shipinventory' => 'Name Shipinventory',
            'cap_shipinventory' => 'Cap Shipinventory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdShipdetails()
    {
        return $this->hasMany(\app\modules\sd\models\SdShipdetail::className(), ['sd_shipinventory_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdShipinventoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdShipinventoryQuery(get_called_class());
    }
}
