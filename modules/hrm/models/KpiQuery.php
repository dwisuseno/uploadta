<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[Kpi]].
 *
 * @see Kpi
 */
class KpiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kpi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kpi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}