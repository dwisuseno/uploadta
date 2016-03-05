<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[Employeehasskill]].
 *
 * @see Employeehasskill
 */
class EmployeehasskillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Employeehasskill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Employeehasskill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}