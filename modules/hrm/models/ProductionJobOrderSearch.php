<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\ProductionJobOrder;

/**
 * app\modules\hrm\models\ProductionJobOrderSearch represents the model behind the search form about `app\modules\hrm\models\ProductionJobOrder`.
 */
 class ProductionJobOrderSearch extends ProductionJobOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'operation_id', 'machine_id', 'employee_id', 'quantity_produced'], 'integer'],
            [['start_planning', 'end_planning', 'start_real', 'end_real', 'planning_duration', 'real_duration', 'time_per_production', 'created_at', 'updated_at'], 'safe'],
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
        $query = ProductionJobOrder::find();

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
            'operation_id' => $this->operation_id,
            'machine_id' => $this->machine_id,
            'employee_id' => $this->employee_id,
            'start_planning' => $this->start_planning,
            'end_planning' => $this->end_planning,
            'start_real' => $this->start_real,
            'end_real' => $this->end_real,
            'quantity_produced' => $this->quantity_produced,
        ]);

        $query->andFilterWhere(['like', 'planning_duration', $this->planning_duration])
            ->andFilterWhere(['like', 'real_duration', $this->real_duration])
            ->andFilterWhere(['like', 'time_per_production', $this->time_per_production])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
