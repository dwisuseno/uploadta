<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kpi;

/**
 * app\models\KpiSearch represents the model behind the search form about `app\models\Kpi`.
 */
 class KpiSearch extends Kpi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sasaranstrategis_id', 'kpitype_id'], 'integer'],
            [['weight', 'target', 'realisasi', 'skor', 'final_skor'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = Kpi::find();

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
            'sasaranstrategis_id' => $this->sasaranstrategis_id,
            'kpitype_id' => $this->kpitype_id,
            'weight' => $this->weight,
            'target' => $this->target,
            'realisasi' => $this->realisasi,
            'skor' => $this->skor,
            'final_skor' => $this->final_skor,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
