<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employeehasskill;

/**
 * app\models\EmployeehasskillSearch represents the model behind the search form about `app\models\Employeehasskill`.
 */
 class EmployeehasskillSearch extends Employeehasskill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'skill_id', 'how_many', 'how_long'], 'integer'],
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
        $query = Employeehasskill::find();

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
            'employee_id' => $this->employee_id,
            'skill_id' => $this->skill_id,
            'how_many' => $this->how_many,
            'how_long' => $this->how_long,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
