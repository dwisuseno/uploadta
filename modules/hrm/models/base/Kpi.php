<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "kpi".
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
 * @property \app\modules\hrm\models\KeyResultArea $keyResultArea
 */
class Kpi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi';
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
        return $this->hasOne(\app\modules\hrm\models\KeyResultArea::className(), ['id' => 'key_result_area_id']);
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
     * @return \app\modules\hrm\models\KpiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\KpiQuery(get_called_class());
    }
}
