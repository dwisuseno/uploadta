<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\UniqueWork;

/**
 * app\modules\hrm\models\UniqueWorkSearch represents the model behind the search form about `app\modules\hrm\models\UniqueWork`.
 */
 class UniqueWorkSearch extends UniqueWork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id'], 'integer'],
            [['start_real', 'end_real', 'created_at', 'updated_at'], 'safe'],
            [['duration_plan', 'duration_real'], 'number'],
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
        $query = UniqueWork::find();

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
            'start_real' => $this->start_real,
            'end_real' => $this->end_real,
            'duration_plan' => $this->duration_plan,
            'duration_real' => $this->duration_real,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
