<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmStrategicTarget]].
 *
 * @see HrmStrategicTarget
 */
class HrmStrategicTargetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmStrategicTarget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmStrategicTarget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}