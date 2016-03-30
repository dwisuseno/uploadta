<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmPersonnelSubArea]].
 *
 * @see HrmPersonnelSubArea
 */
class HrmPersonnelSubAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmPersonnelSubArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmPersonnelSubArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}