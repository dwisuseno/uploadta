<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmBankAccount]].
 *
 * @see HrmBankAccount
 */
class HrmBankAccountQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmBankAccount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmBankAccount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}