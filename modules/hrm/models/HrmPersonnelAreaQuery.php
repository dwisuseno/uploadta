<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmPersonnelArea]].
 *
 * @see HrmPersonnelArea
 */
class HrmPersonnelAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmPersonnelArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmPersonnelArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}