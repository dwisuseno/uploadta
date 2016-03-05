<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrData]].
 *
 * @see HrData
 */
class HrDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}