<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdShipinventory]].
 *
 * @see SdShipinventory
 */
class SdShipinventoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdShipinventory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdShipinventory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}