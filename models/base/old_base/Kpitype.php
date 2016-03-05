<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "kpitype".
 *
 * @property integer $id
 * @property string $kpi_code
 * @property string $kpi_type_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Kpi[] $kpis
 */
class Kpitype extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpitype';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_code' => 'Kpi Code',
            'kpi_type_name' => 'Kpi Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKpis()
    {
        return $this->hasMany(\app\models\Kpi::className(), ['kpitype_id' => 'id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\KpitypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\KpitypeQuery(get_called_class());
    }
}
