<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Personnelstructure]].
 *
 * @see Personnelstructure
 */
class PersonnelstructureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Personnelstructure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Personnelstructure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}