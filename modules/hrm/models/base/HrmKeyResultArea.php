<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_key_result_area".
 *
 * @property integer $id
 * @property integer $sasaran_strategis_id
 * @property string $key_result_area
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmKeyPerformanceIndicator[] $hrmKeyPerformanceIndicators
 * @property \app\modules\hrm\models\HrmStrategicTarget $sasaranStrategis
 */
class HrmKeyResultArea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_key_result_area';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sasaran_strategis_id' => 'Sasaran Strategis ID',
            'key_result_area' => 'Key Result Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmKeyPerformanceIndicators()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmKeyPerformanceIndicator::className(), ['key_result_area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSasaranStrategis()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmStrategicTarget::className(), ['id' => 'sasaran_strategis_id']);
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
     * @return \app\modules\hrm\models\HrmKeyResultAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmKeyResultAreaQuery(get_called_class());
    }
}
