<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[FamilyAllowance]].
 *
 * @see FamilyAllowance
 */
class FamilyAllowanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FamilyAllowance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FamilyAllowance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}