<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_division".
 *
 * @property integer $id
 * @property string $code_division
 * @property string $name_division
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdSalesarea[] $sdSalesareas
 */
class SdDivision extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_division';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_division' => 'Code Division',
            'name_division' => 'Name Division',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesareas()
    {
        return $this->hasMany(\app\modules\sd\models\SdSalesarea::className(), ['sd_division_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdDivisionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdDivisionQuery(get_called_class());
    }
}
