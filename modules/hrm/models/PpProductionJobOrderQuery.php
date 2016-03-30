<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[PpProductionJobOrder]].
 *
 * @see PpProductionJobOrder
 */
class PpProductionJobOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PpProductionJobOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PpProductionJobOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}