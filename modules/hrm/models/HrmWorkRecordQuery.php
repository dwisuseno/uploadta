<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmWorkRecord]].
 *
 * @see HrmWorkRecord
 */
class HrmWorkRecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmWorkRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmWorkRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}