<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sasaranstrategis]].
 *
 * @see Sasaranstrategis
 */
class SasaranstrategisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Sasaranstrategis[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sasaranstrategis|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}