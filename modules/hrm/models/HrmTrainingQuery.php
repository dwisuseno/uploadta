<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmTraining]].
 *
 * @see HrmTraining
 */
class HrmTrainingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmTraining[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmTraining|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}