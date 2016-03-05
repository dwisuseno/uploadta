<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hrdata]].
 *
 * @see Hrdata
 */
class HrdataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Hrdata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hrdata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}