<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Positions;

/**
 * app\models\PositionsSearch represents the model behind the search form about `app\models\Positions`.
 */
 class PositionsSearch extends Positions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vacancy', 'jobs_id'], 'integer'],
            [['positions_code', 'positions_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = Positions::find();

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
            'vacancy' => $this->vacancy,
            'jobs_id' => $this->jobs_id,
        ]);

        $query->andFilterWhere(['like', 'positions_code', $this->positions_code])
            ->andFilterWhere(['like', 'positions_id', $this->positions_id])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
