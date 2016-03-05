<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Workexp]].
 *
 * @see Workexp
 */
class WorkexpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Workexp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Workexp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}