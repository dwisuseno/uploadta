<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmDetailTraining]].
 *
 * @see HrmDetailTraining
 */
class HrmDetailTrainingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmDetailTraining[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmDetailTraining|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}