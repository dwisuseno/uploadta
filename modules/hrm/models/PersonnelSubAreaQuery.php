<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[PersonnelSubArea]].
 *
 * @see PersonnelSubArea
 */
class PersonnelSubAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PersonnelSubArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PersonnelSubArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}