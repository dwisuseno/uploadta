<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Orgstructure]].
 *
 * @see Orgstructure
 */
class OrgstructureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Orgstructure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orgstructure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}