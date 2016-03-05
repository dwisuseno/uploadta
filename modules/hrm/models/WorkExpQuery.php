<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[WorkExp]].
 *
 * @see WorkExp
 */
class WorkExpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return WorkExp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkExp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}