<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Personnelarea]].
 *
 * @see Personnelarea
 */
class PersonnelareaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Personnelarea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Personnelarea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}