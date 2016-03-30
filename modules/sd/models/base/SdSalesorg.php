<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_salesorg".
 *
 * @property integer $id
 * @property string $code_salesorg
 * @property string $name_salesorg
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdSalesarea[] $sdSalesareas
 */
class SdSalesorg extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_salesorg';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_salesorg' => 'Code Salesorg',
            'name_salesorg' => 'Name Salesorg',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesareas()
    {
        return $this->hasMany(\app\modules\sd\models\SdSalesarea::className(), ['sd_salesorg_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdSalesorgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdSalesorgQuery(get_called_class());
    }
}
