<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[Kra]].
 *
 * @see Kra
 */
class KraQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kra[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kra|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}