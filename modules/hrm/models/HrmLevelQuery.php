<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmLevel]].
 *
 * @see HrmLevel
 */
class HrmLevelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmLevel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmLevel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}