<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\Positions;

/**
 * app\modules\hrm\models\PositionsSearch represents the model behind the search form about `app\modules\hrm\models\Positions`.
 */
 class PositionsSearch extends Positions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jobs_id', 'employee_id', 'basic_salary'], 'integer'],
            [['positions_code', 'vacancy', 'positions_as', 'created_at', 'updated_at'], 'safe'],
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
            'jobs_id' => $this->jobs_id,
            'employee_id' => $this->employee_id,
            'basic_salary' => $this->basic_salary,
        ]);

        $query->andFilterWhere(['like', 'positions_code', $this->positions_code])
            ->andFilterWhere(['like', 'vacancy', $this->vacancy])
            ->andFilterWhere(['like', 'positions_as', $this->positions_as])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
