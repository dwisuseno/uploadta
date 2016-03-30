<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdCustomeraccount]].
 *
 * @see SdCustomeraccount
 */
class SdCustomeraccountQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdCustomeraccount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdCustomeraccount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}