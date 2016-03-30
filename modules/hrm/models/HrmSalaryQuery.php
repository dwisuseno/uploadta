<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmSalary]].
 *
 * @see HrmSalary
 */
class HrmSalaryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmSalary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmSalary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}