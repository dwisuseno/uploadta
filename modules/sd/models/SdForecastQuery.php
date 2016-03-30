<?php

namespace app\modules\sd\models;

/**
 * This is the ActiveQuery class for [[SdForecast]].
 *
 * @see SdForecast
 */
class SdForecastQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SdForecast[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdForecast|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}