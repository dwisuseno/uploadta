<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_key_performance_indicator".
 *
 * @property integer $id
 * @property integer $key_result_area_id
 * @property string $kpi_detail
 * @property double $weight
 * @property double $target
 * @property double $realisasi
 * @property double $skor
 * @property double $final_skor
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmKeyResultArea $keyResultArea
 */
class HrmKeyPerformanceIndicator extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_key_performance_indicator';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_result_area_id' => 'Key Result Area ID',
            'kpi_detail' => 'Kpi Detail',
            'weight' => 'Weight',
            'target' => 'Target',
            'realisasi' => 'Realisasi',
            'skor' => 'Skor',
            'final_skor' => 'Final Skor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyResultArea()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmKeyResultArea::className(), ['id' => 'key_result_area_id']);
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
     * @return \app\modules\hrm\models\HrmKeyPerformanceIndicatorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmKeyPerformanceIndicatorQuery(get_called_class());
    }
}
