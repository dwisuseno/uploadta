<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdSale;

/**
 * app\modules\sd\models\SdSaleSearch represents the model behind the search form about `app\modules\sd\models\SdSale`.
 */
 class SdSaleSearch extends SdSale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'billto_sale', 'inquirystatus_sale', 'quotationstatus_sale', 'sostatus_sale', 'delivstatus_sale', 'sd_ship_id', 'sd_salestype_id', 'sd_shipcondition_id', 'sd_taxdetail_id', 'sd_customer_id', 'ar_payterm_id', 'currency_id', 'sd_salesarea_id'], 'integer'],
            [['shipto_sale', 'ponumber_sale', 'podate_sale', 'validfrom_sale', 'validto_sale', 'pricedate_sale', 'delivdate_sale', 'reject_sale', 'priceexp_sale', 'inquirycode_sale', 'quotationcode_sale', 'socode_sale', 'delivcode_sale', 'billblock_sale', 'reasonblock_sale', 'created_at', 'updated_at', 'billstatus_sale', 'freightpayto_sale'], 'safe'],
            [['net_sale', 'distance_sale', 'weight_sale', 'freightcost_sale'], 'number'],
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
        $query = SdSale::find()->where('sostatus_sale = 2 OR sostatus_sale = 3');

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
            'billto_sale' => $this->billto_sale,
            'net_sale' => $this->net_sale,
            'distance_sale' => $this->distance_sale,
            'podate_sale' => $this->podate_sale,
            'weight_sale' => $this->weight_sale,
            'validfrom_sale' => $this->validfrom_sale,
            'validto_sale' => $this->validto_sale,
            'pricedate_sale' => $this->pricedate_sale,
            'delivdate_sale' => $this->delivdate_sale,
            'priceexp_sale' => $this->priceexp_sale,
            'inquirystatus_sale' => $this->inquirystatus_sale,
            'quotationstatus_sale' => $this->quotationstatus_sale,
            'sostatus_sale' => $this->sostatus_sale,
            'delivstatus_sale' => $this->delivstatus_sale,
            'freightcost_sale' => $this->freightcost_sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sd_ship_id' => $this->sd_ship_id,
            'sd_salestype_id' => $this->sd_salestype_id,
            'sd_shipcondition_id' => $this->sd_shipcondition_id,
            'sd_taxdetail_id' => $this->sd_taxdetail_id,
            'sd_customer_id' => $this->sd_customer_id,
            'ar_payterm_id' => $this->ar_payterm_id,
            'currency_id' => $this->currency_id,
            'sd_salesarea_id' => $this->sd_salesarea_id,
        ]);

        $query->andFilterWhere(['like', 'shipto_sale', $this->shipto_sale])
            ->andFilterWhere(['like', 'ponumber_sale', $this->ponumber_sale])
            ->andFilterWhere(['like', 'reject_sale', $this->reject_sale])
            ->andFilterWhere(['like', 'inquirycode_sale', $this->inquirycode_sale])
            ->andFilterWhere(['like', 'quotationcode_sale', $this->quotationcode_sale])
            ->andFilterWhere(['like', 'socode_sale', $this->socode_sale])
            ->andFilterWhere(['like', 'delivcode_sale', $this->delivcode_sale])
            ->andFilterWhere(['like', 'billblock_sale', $this->billblock_sale])
            ->andFilterWhere(['like', 'reasonblock_sale', $this->reasonblock_sale])
            ->andFilterWhere(['like', 'billstatus_sale', $this->billstatus_sale])
            ->andFilterWhere(['like', 'freightpayto_sale', $this->freightpayto_sale]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchinquiry($params)
    {
        $query = SdSale::find()->where('inquirystatus_sale = 0 OR inquirystatus_sale = 1 OR inquirystatus_sale = 2');

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
            'billto_sale' => $this->billto_sale,
            'net_sale' => $this->net_sale,
            'distance_sale' => $this->distance_sale,
            'podate_sale' => $this->podate_sale,
            'weight_sale' => $this->weight_sale,
            'validfrom_sale' => $this->validfrom_sale,
            'validto_sale' => $this->validto_sale,
            'pricedate_sale' => $this->pricedate_sale,
            'delivdate_sale' => $this->delivdate_sale,
            'priceexp_sale' => $this->priceexp_sale,
            'inquirystatus_sale' => $this->inquirystatus_sale,
            'quotationstatus_sale' => $this->quotationstatus_sale,
            'sostatus_sale' => $this->sostatus_sale,
            'delivstatus_sale' => $this->delivstatus_sale,
            'freightcost_sale' => $this->freightcost_sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sd_ship_id' => $this->sd_ship_id,
            'sd_salestype_id' => $this->sd_salestype_id,
            'sd_shipcondition_id' => $this->sd_shipcondition_id,
            'sd_taxdetail_id' => $this->sd_taxdetail_id,
            'sd_customer_id' => $this->sd_customer_id,
            'ar_payterm_id' => $this->ar_payterm_id,
            'currency_id' => $this->currency_id,
            'sd_salesarea_id' => $this->sd_salesarea_id,
        ]);

        $query->andFilterWhere(['like', 'shipto_sale', $this->shipto_sale])
            ->andFilterWhere(['like', 'ponumber_sale', $this->ponumber_sale])
            ->andFilterWhere(['like', 'reject_sale', $this->reject_sale])
            ->andFilterWhere(['like', 'inquirycode_sale', $this->inquirycode_sale])
            ->andFilterWhere(['like', 'quotationcode_sale', $this->quotationcode_sale])
            ->andFilterWhere(['like', 'socode_sale', $this->socode_sale])
            ->andFilterWhere(['like', 'delivcode_sale', $this->delivcode_sale])
            ->andFilterWhere(['like', 'billblock_sale', $this->billblock_sale])
            ->andFilterWhere(['like', 'reasonblock_sale', $this->reasonblock_sale])
            ->andFilterWhere(['like', 'billstatus_sale', $this->billstatus_sale])
            ->andFilterWhere(['like', 'freightpayto_sale', $this->freightpayto_sale]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchquotation($params)
    {
        $query = SdSale::find()->where('quotationstatus_sale = 1 OR quotationstatus_sale = 2 OR quotationstatus_sale = 3');

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
            'billto_sale' => $this->billto_sale,
            'net_sale' => $this->net_sale,
            'distance_sale' => $this->distance_sale,
            'podate_sale' => $this->podate_sale,
            'weight_sale' => $this->weight_sale,
            'validfrom_sale' => $this->validfrom_sale,
            'validto_sale' => $this->validto_sale,
            'pricedate_sale' => $this->pricedate_sale,
            'delivdate_sale' => $this->delivdate_sale,
            'priceexp_sale' => $this->priceexp_sale,
            'inquirystatus_sale' => $this->inquirystatus_sale,
            'quotationstatus_sale' => $this->quotationstatus_sale,
            'sostatus_sale' => $this->sostatus_sale,
            'delivstatus_sale' => $this->delivstatus_sale,
            'freightcost_sale' => $this->freightcost_sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sd_ship_id' => $this->sd_ship_id,
            'sd_salestype_id' => $this->sd_salestype_id,
            'sd_shipcondition_id' => $this->sd_shipcondition_id,
            'sd_taxdetail_id' => $this->sd_taxdetail_id,
            'sd_customer_id' => $this->sd_customer_id,
            'ar_payterm_id' => $this->ar_payterm_id,
            'currency_id' => $this->currency_id,
            'sd_salesarea_id' => $this->sd_salesarea_id,
        ]);

        $query->andFilterWhere(['like', 'shipto_sale', $this->shipto_sale])
            ->andFilterWhere(['like', 'ponumber_sale', $this->ponumber_sale])
            ->andFilterWhere(['like', 'reject_sale', $this->reject_sale])
            ->andFilterWhere(['like', 'inquirycode_sale', $this->inquirycode_sale])
            ->andFilterWhere(['like', 'quotationcode_sale', $this->quotationcode_sale])
            ->andFilterWhere(['like', 'socode_sale', $this->socode_sale])
            ->andFilterWhere(['like', 'delivcode_sale', $this->delivcode_sale])
            ->andFilterWhere(['like', 'billblock_sale', $this->billblock_sale])
            ->andFilterWhere(['like', 'reasonblock_sale', $this->reasonblock_sale])
            ->andFilterWhere(['like', 'billstatus_sale', $this->billstatus_sale])
            ->andFilterWhere(['like', 'freightpayto_sale', $this->freightpayto_sale]);

        return $dataProvider;
    }
}
