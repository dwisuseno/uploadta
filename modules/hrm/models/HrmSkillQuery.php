<?php

namespace app\modules\hrm\models;

/**
 * This is the ActiveQuery class for [[HrmSkill]].
 *
 * @see HrmSkill
 */
class HrmSkillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HrmSkill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HrmSkill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}