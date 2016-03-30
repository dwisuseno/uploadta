<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdDchl;

/**
 * app\modules\sd\models\SdDchlSearch represents the model behind the search form about `app\modules\sd\models\SdDchl`.
 */
 class SdDchlSearch extends SdDchl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code_dchl', 'name_dchl', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdDchl::find();

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

        $query->andFilterWhere(['like', 'code_dchl', $this->code_dchl])
            ->andFilterWhere(['like', 'name_dchl', $this->name_dchl]);

        return $dataProvider;
    }
}
