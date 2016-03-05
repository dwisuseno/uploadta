<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Personnelsubarea]].
 *
 * @see Personnelsubarea
 */
class PersonnelsubareaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Personnelsubarea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Personnelsubarea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}