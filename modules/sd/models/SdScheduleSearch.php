<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdSchedule;

/**
 * app\modules\sd\models\SdScheduleSearch represents the model behind the search form about `app\modules\sd\models\SdSchedule`.
 */
 class SdScheduleSearch extends SdSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'confirmqty_schedule', 'pickqty_schedule', 'delivqty_schedule', 'sd_salesitem_id'], 'integer'],
            [['confirmdate_schedule', 'pickdate_schedule', 'delivdate_schedule'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SdSchedule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'confirmqty_schedule' => $this->confirmqty_schedule,
            'confirmdate_schedule' => $this->confirmdate_schedule,
            'pickqty_schedule' => $this->pickqty_schedule,
            'pickdate_schedule' => $this->pickdate_schedule,
            'delivqty_schedule' => $this->delivqty_schedule,
            'delivdate_schedule' => $this->delivdate_schedule,
            'sd_salesitem_id' => $this->sd_salesitem_id,
        ]);

        return $dataProvider;
    }
}
