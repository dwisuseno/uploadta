<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdSalesarea]].
 *
 * @see SdSalesarea
 */
class SdSalesareaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdSalesarea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdSalesarea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}