<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[KpiType]].
 *
 * @see KpiType
 */
class KpiTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return KpiType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KpiType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}