<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdDivision;

/**
 * app\modules\sd\models\SdDivisionSearch represents the model behind the search form about `app\modules\sd\models\SdDivision`.
 */
 class SdDivisionSearch extends SdDivision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code_division', 'name_division', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdDivision::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_division', $this->code_division])
            ->andFilterWhere(['like', 'name_division', $this->name_division]);

        return $dataProvider;
    }
}
