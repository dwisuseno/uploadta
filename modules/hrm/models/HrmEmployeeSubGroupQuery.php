<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmEmployeeSubGroup]].
 *
 * @see HrmEmployeeSubGroup
 */
class HrmEmployeeSubGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmEmployeeSubGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmEmployeeSubGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}