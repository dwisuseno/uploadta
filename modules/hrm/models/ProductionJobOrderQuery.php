<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[ProductionJobOrder]].
 *
 * @see ProductionJobOrder
 */
class ProductionJobOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductionJobOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductionJobOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}