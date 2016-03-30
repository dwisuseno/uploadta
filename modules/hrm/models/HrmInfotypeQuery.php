<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmInfotype]].
 *
 * @see HrmInfotype
 */
class HrmInfotypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmInfotype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmInfotype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}