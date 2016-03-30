<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSchedule]].
 *
 * @see SdSchedule
 */
class SdScheduleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSchedule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSchedule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}