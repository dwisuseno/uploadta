<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmCandidate]].
 *
 * @see HrmCandidate
 */
class HrmCandidateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmCandidate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmCandidate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}