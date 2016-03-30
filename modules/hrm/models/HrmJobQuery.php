<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmJob]].
 *
 * @see HrmJob
 */
class HrmJobQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmJob[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmJob|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}