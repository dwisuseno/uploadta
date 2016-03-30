<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\IwmItemmaster;

/**
 * app\modules\sd\models\IwmItemmasterSearch represents the model behind the search form about `app\modules\sd\models\IwmItemmaster`.
 */
 class IwmItemmasterSearch extends IwmItemmaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weight_itemmaster', 'price_itemmaster', 'uom_id', 'currency_id'], 'integer'],
            [['code_itemmaster', 'desc_itemmaster'], 'safe'],
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
        $query = IwmItemmaster::find();

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
            'weight_itemmaster' => $this->weight_itemmaster,
            'price_itemmaster' => $this->price_itemmaster,
            'uom_id' => $this->uom_id,
            'currency_id' => $this->currency_id,
        ]);

        $query->andFilterWhere(['like', 'code_itemmaster', $this->code_itemmaster])
            ->andFilterWhere(['like', 'desc_itemmaster', $this->desc_itemmaster]);

        return $dataProvider;
    }
}
