<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdPricedetail]].
 *
 * @see SdPricedetail
 */
class SdPricedetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdPricedetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdPricedetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}