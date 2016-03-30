<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdCustomer]].
 *
 * @see SdCustomer
 */
class SdCustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}