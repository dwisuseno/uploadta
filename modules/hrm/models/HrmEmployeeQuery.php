<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmEmployee]].
 *
 * @see HrmEmployee
 */
class HrmEmployeeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmEmployee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmEmployee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}