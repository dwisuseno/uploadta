<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_schedule".
 *
 * @property integer $id
 * @property integer $confirmqty_schedule
 * @property string $confirmdate_schedule
 * @property integer $pickqty_schedule
 * @property string $pickdate_schedule
 * @property integer $delivqty_schedule
 * @property string $delivdate_schedule
 * @property integer $sd_salesitem_id
 *
 * @property \app\modules\sd\models\SdSalesitem $sdSalesitem
 */
class SdSchedule extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_schedule';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'confirmqty_schedule' => 'Confirmqty Schedule',
            'confirmdate_schedule' => 'Confirmdate Schedule',
            'pickqty_schedule' => 'Pickqty Schedule',
            'pickdate_schedule' => 'Pickdate Schedule',
            'delivqty_schedule' => 'Delivqty Schedule',
            'delivdate_schedule' => 'Delivdate Schedule',
            'sd_salesitem_id' => 'Sd Salesitem ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesitem()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalesitem::className(), ['id' => 'sd_salesitem_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdScheduleQuery(get_called_class());
    }
}
