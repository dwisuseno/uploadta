<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmClient]].
 *
 * @see HrmClient
 */
class HrmClientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmClient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmClient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}