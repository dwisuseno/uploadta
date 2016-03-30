<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[IwmItemmaster]].
 *
 * @see IwmItemmaster
 */
class IwmItemmasterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IwmItemmaster[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IwmItemmaster|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}