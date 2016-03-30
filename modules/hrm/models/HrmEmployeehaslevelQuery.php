<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmEmployeehaslevel]].
 *
 * @see HrmEmployeehaslevel
 */
class HrmEmployeehaslevelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmEmployeehaslevel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmEmployeehaslevel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}