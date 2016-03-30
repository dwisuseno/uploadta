<?php

namespace app\modules\sd\models;

use Yii;
use \app\modules\sd\models\base\SdSchedule as BaseSdSchedule;

/**
 * This is the model class for table "sd_schedule".
 */
class SdSchedule extends BaseSdSchedule
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['confirmqty_schedule', 'pickqty_schedule', 'delivqty_schedule', 'sd_salesitem_id'], 'integer'],
            [['confirmdate_schedule', 'pickdate_schedule', 'delivdate_schedule'], 'safe']
        ];
    }
	
}
