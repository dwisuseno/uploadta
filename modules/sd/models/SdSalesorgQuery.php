<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSalesorg]].
 *
 * @see SdSalesorg
 */
class SdSalesorgQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSalesorg[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSalesorg|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}