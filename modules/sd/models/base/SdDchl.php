<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_dchl".
 *
 * @property integer $id
 * @property string $code_dchl
 * @property string $name_dchl
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdSalesarea[] $sdSalesareas
 */
class SdDchl extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_dchl';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_dchl' => 'Code Dchl',
            'name_dchl' => 'Name Dchl',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesareas()
    {
        return $this->hasMany(\app\modules\sd\models\SdSalesarea::className(), ['sd_dchl_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdDchlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdDchlQuery(get_called_class());
    }
}
