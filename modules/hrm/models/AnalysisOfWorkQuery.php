<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[AnalysisOfWork]].
 *
 * @see AnalysisOfWork
 */
class AnalysisOfWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AnalysisOfWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AnalysisOfWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}