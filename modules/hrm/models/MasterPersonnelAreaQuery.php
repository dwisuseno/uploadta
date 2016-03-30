<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[MasterPersonnelArea]].
 *
 * @see MasterPersonnelArea
 */
class MasterPersonnelAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MasterPersonnelArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterPersonnelArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}