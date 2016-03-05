<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Kpitype]].
 *
 * @see Kpitype
 */
class KpitypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kpitype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kpitype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}