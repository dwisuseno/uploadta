<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[UniqueWork]].
 *
 * @see UniqueWork
 */
class UniqueWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UniqueWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UniqueWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}