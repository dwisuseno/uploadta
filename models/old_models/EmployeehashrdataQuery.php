<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Employeehashrdata]].
 *
 * @see Employeehashrdata
 */
class EmployeehashrdataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Employeehashrdata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Employeehashrdata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}