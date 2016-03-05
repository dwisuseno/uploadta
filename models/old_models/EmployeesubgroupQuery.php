<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Employeesubgroup]].
 *
 * @see Employeesubgroup
 */
class EmployeesubgroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Employeesubgroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Employeesubgroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}