<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmFamilyAllowance]].
 *
 * @see HrmFamilyAllowance
 */
class HrmFamilyAllowanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmFamilyAllowance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmFamilyAllowance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}