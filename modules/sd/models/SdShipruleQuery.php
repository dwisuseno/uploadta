<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdShiprule]].
 *
 * @see SdShiprule
 */
class SdShipruleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdShiprule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdShiprule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}