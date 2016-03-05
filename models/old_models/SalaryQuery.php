<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Salary]].
 *
 * @see Salary
 */
class SalaryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Salary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Salary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}