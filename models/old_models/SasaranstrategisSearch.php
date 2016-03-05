<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sasaranstrategis;

/**
 * app\models\SasaranstrategisSearch represents the model behind the search form about `app\models\Sasaranstrategis`.
 */
 class SasaranstrategisSearch extends Sasaranstrategis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hrdata_id', 'kra_id', 'employee_id'], 'integer'],
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
        $query = Sasaranstrategis::find();

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
            'hrdata_id' => $this->hrdata_id,
            'kra_id' => $this->kra_id,
            'employee_id' => $this->employee_id,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
