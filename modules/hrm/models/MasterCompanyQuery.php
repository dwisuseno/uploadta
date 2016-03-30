<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[MasterCompany]].
 *
 * @see MasterCompany
 */
class MasterCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MasterCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}