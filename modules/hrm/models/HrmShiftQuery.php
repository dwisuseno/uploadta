<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmShift]].
 *
 * @see HrmShift
 */
class HrmShiftQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmShift[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmShift|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}