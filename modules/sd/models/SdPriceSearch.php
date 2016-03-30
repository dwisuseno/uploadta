<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdPrice;

/**
 * app\modules\sd\models\SdPriceSearch represents the model behind the search form about `app\modules\sd\models\SdPrice`.
 */
 class SdPriceSearch extends SdPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amount_price', 'currency_id'], 'integer'],
            [['code_price', 'name_price', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdPrice::find();

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
            'amount_price' => $this->amount_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'currency_id' => $this->currency_id,
        ]);

        $query->andFilterWhere(['like', 'code_price', $this->code_price])
            ->andFilterWhere(['like', 'name_price', $this->name_price]);

        return $dataProvider;
    }
}
