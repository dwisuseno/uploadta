<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[MasterPersonnelSubArea]].
 *
 * @see MasterPersonnelSubArea
 */
class MasterPersonnelSubAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MasterPersonnelSubArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterPersonnelSubArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}