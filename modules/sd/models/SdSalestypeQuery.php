<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSalestype]].
 *
 * @see SdSalestype
 */
class SdSalestypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSalestype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSalestype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}