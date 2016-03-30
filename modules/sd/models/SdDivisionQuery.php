<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdDivision]].
 *
 * @see SdDivision
 */
class SdDivisionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdDivision[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdDivision|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}