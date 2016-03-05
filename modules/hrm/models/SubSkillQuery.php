<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[SubSkill]].
 *
 * @see SubSkill
 */
class SubSkillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SubSkill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SubSkill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}