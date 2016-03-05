<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "kpi".
 *
 * @property integer $id
 * @property integer $sasaranstrategis_id
 * @property integer $kpitype_id
 * @property double $weight
 * @property double $target
 * @property double $realisasi
 * @property double $skor
 * @property double $final_skor
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Sasaranstrategis $sasaranstrategis
 * @property \app\models\Kpitype $kpitype
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
            'sasaranstrategis_id' => 'Sasaranstrategis ID',
            'kpitype_id' => 'Kpitype ID',
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
    public function getSasaranstrategis()
    {
        return $this->hasOne(\app\models\Sasaranstrategis::className(), ['id' => 'sasaranstrategis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKpitype()
    {
        return $this->hasOne(\app\models\Kpitype::className(), ['id' => 'kpitype_id']);
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
     * @return \app\models\KpiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\KpiQuery(get_called_class());
    }
}
