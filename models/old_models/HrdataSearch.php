<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hrdata;

/**
 * app\models\HrdataSearch represents the model behind the search form about `app\models\Hrdata`.
 */
 class HrdataSearch extends Hrdata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'children', 'bankaccount_id'], 'integer'],
            [['personnelnumber', 'date_of_birth', 'language', 'nationality', 'marital_status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Hrdata::find();

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
            'date_of_birth' => $this->date_of_birth,
            'children' => $this->children,
            'bankaccount_id' => $this->bankaccount_id,
        ]);

        $query->andFilterWhere(['like', 'personnelnumber', $this->personnelnumber])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
