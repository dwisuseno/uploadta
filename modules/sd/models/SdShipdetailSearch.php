<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdShipdetail;

/**
 * app\modules\sd\models\SdShipdetailSearch represents the model behind the search form about `app\modules\sd\models\SdShipdetail`.
 */
 class SdShipdetailSearch extends SdShipdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sd_ship_id', 'sd_shipinventory_id', 'cost_shipdetail', 'currency_id'], 'integer'],
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
        $query = SdShipdetail::find();

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
            'sd_ship_id' => $this->sd_ship_id,
            'sd_shipinventory_id' => $this->sd_shipinventory_id,
            'cost_shipdetail' => $this->cost_shipdetail,
            'currency_id' => $this->currency_id,
        ]);

        return $dataProvider;
    }
}
