<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSale]].
 *
 * @see SdSale
 */
class SdSaleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSale[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSale|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}