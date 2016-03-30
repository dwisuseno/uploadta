<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmHasshift]].
 *
 * @see HrmHasshift
 */
class HrmHasshiftQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmHasshift[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmHasshift|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}