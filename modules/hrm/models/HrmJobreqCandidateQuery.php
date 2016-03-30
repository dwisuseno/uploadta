<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmJobreqCandidate]].
 *
 * @see HrmJobreqCandidate
 */
class HrmJobreqCandidateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmJobreqCandidate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmJobreqCandidate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}