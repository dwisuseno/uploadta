<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdCp]].
 *
 * @see SdCp
 */
class SdCpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdCp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdCp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}