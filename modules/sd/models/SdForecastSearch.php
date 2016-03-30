<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdForecast;

/**
 * app\modules\sd\models\SdForecastSearch represents the model behind the search form about `app\modules\sd\models\SdForecast`.
 */
 class SdForecastSearch extends SdForecast
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year_forecast', 'demand_forecast', 'predict_forecast', 'sd_sale_id'], 'integer'],
            [['code_forecast', 'month_forecast', 'created_at', 'updated_at'], 'safe'],
            [['error_forecast'], 'number'],
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
        $query = SdForecast::find();

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
            'year_forecast' => $this->year_forecast,
            'demand_forecast' => $this->demand_forecast,
            'predict_forecast' => $this->predict_forecast,
            'error_forecast' => $this->error_forecast,
            'sd_sale_id' => $this->sd_sale_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_forecast', $this->code_forecast])
            ->andFilterWhere(['like', 'month_forecast', $this->month_forecast]);

        return $dataProvider;
    }
}
