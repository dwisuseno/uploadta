<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmEmployeeGroup]].
 *
 * @see HrmEmployeeGroup
 */
class HrmEmployeeGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmEmployeeGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmEmployeeGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}