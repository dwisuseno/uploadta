<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[EmployeeSubGroup]].
 *
 * @see EmployeeSubGroup
 */
class EmployeeSubGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EmployeeSubGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmployeeSubGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}