<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[MasterClient]].
 *
 * @see MasterClient
 */
class MasterClientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MasterClient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterClient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}