<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmJobRequisition]].
 *
 * @see HrmJobRequisition
 */
class HrmJobRequisitionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmJobRequisition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmJobRequisition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}