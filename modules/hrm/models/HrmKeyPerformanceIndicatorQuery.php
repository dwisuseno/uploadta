<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmKeyPerformanceIndicator]].
 *
 * @see HrmKeyPerformanceIndicator
 */
class HrmKeyPerformanceIndicatorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmKeyPerformanceIndicator[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmKeyPerformanceIndicator|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}