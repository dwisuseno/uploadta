<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmPosition]].
 *
 * @see HrmPosition
 */
class HrmPositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmPosition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmPosition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}