<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "kpi_type".
 *
 * @property integer $id
 * @property string $kpi_code
 * @property string $kpi_type_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Kpi[] $kpis
 */
class KpiType extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_type';
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
        return $this->hasMany(\app\modules\hrm\models\Kpi::className(), ['kpi_type_id' => 'id']);
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
     * @return \app\modules\hrm\models\KpiTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\KpiTypeQuery(get_called_class());
    }
}
