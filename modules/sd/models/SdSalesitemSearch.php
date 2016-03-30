<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdSalesitem;

/**
 * app\modules\sd\models\SdSalesitemSearch represents the model behind the search form about `app\modules\sd\models\SdSalesitem`.
 */
 class SdSalesitemSearch extends SdSalesitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quantity_salesitem', 'delivqty_salesitem', 'confirmqty_salesitem', 'pickqty', 'batch', 'iwm_item_master_id', 'sd_sale_id', 'currency_id'], 'integer'],
            [['uom_salesitem', 'desc_salesitem', 'created_at', 'updated_at'], 'safe'],
            [['price_salesitem', 'priceori_salesitem', 'linetotal_salesitem', 'weight_salesitem'], 'number'],
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
        $query = SdSalesitem::find();

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
            'quantity_salesitem' => $this->quantity_salesitem,
            'price_salesitem' => $this->price_salesitem,
            'priceori_salesitem' => $this->priceori_salesitem,
            'linetotal_salesitem' => $this->linetotal_salesitem,
            'delivqty_salesitem' => $this->delivqty_salesitem,
            'confirmqty_salesitem' => $this->confirmqty_salesitem,
            'pickqty' => $this->pickqty,
            'batch' => $this->batch,
            'weight_salesitem' => $this->weight_salesitem,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'currency_id' => $this->currency_id,
            'iwm_item_master_id' => $this->iwm_item_master_id,
            'sd_sale_id' => $this->sd_sale_id,
        ]);

        $query->andFilterWhere(['like', 'uom_salesitem', $this->uom_salesitem])
            ->andFilterWhere(['like', 'desc_salesitem', $this->desc_salesitem]);

        return $dataProvider;
    }
}
