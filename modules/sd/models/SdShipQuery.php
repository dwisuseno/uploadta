<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdShip]].
 *
 * @see SdShip
 */
class SdShipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdShip[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdShip|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}