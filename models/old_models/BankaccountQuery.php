<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Bankaccount]].
 *
 * @see Bankaccount
 */
class BankaccountQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Bankaccount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Bankaccount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}