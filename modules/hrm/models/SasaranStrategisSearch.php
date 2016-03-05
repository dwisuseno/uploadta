<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\SasaranStrategis;

/**
 * app\modules\hrm\models\SasaranStrategisSearch represents the model behind the search form about `app\modules\hrm\models\SasaranStrategis`.
 */
 class SasaranStrategisSearch extends SasaranStrategis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id'], 'integer'],
            [['sasaranstrategis_code', 'sasaran_strategis_detail', 'period', 'created_at', 'updated_at'], 'safe'],
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
        $query = SasaranStrategis::find();

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
            'employee_id' => $this->employee_id,
            'period' => $this->period,
        ]);

        $query->andFilterWhere(['like', 'sasaranstrategis_code', $this->sasaranstrategis_code])
            ->andFilterWhere(['like', 'sasaran_strategis_detail', $this->sasaran_strategis_detail])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
