<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmKeyResultArea]].
 *
 * @see HrmKeyResultArea
 */
class HrmKeyResultAreaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmKeyResultArea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmKeyResultArea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}