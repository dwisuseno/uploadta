<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSalesitem]].
 *
 * @see SdSalesitem
 */
class SdSalesitemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSalesitem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSalesitem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}