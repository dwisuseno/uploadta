<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdCustomer;

/**
 * app\modules\sd\models\SdCustomerSearch represents the model behind the search form about `app\modules\sd\models\SdCustomer`.
 */
 class SdCustomerSearch extends SdCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'probability_customer', 'sd_salesarea_id', 'ar_payterm_id', 'sd_cp_id', 'sd_ship_id', 'currency_id', 'ar_dunning_id', 'country_id'], 'integer'],
            [['code_customer', 'title_customer', 'name_customer', 'street_customer', 'postal_customer', 'city_customer', 'pay_customer', 'delivprior_customer', 'pb_customer', 'telp_customer', 'telpext_customer', 'mobile_customer', 'email_customer', 'comment_customer', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdCustomer::find();

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
            'probability_customer' => $this->probability_customer,
            'sd_salesarea_id' => $this->sd_salesarea_id,
            'ar_payterm_id' => $this->ar_payterm_id,
            'sd_cp_id' => $this->sd_cp_id,
            'sd_ship_id' => $this->sd_ship_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'currency_id' => $this->currency_id,
            'ar_dunning_id' => $this->ar_dunning_id,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'code_customer', $this->code_customer])
            ->andFilterWhere(['like', 'title_customer', $this->title_customer])
            ->andFilterWhere(['like', 'name_customer', $this->name_customer])
            ->andFilterWhere(['like', 'street_customer', $this->street_customer])
            ->andFilterWhere(['like', 'postal_customer', $this->postal_customer])
            ->andFilterWhere(['like', 'city_customer', $this->city_customer])
            ->andFilterWhere(['like', 'pay_customer', $this->pay_customer])
            ->andFilterWhere(['like', 'delivprior_customer', $this->delivprior_customer])
            ->andFilterWhere(['like', 'pb_customer', $this->pb_customer])
            ->andFilterWhere(['like', 'telp_customer', $this->telp_customer])
            ->andFilterWhere(['like', 'telpext_customer', $this->telpext_customer])
            ->andFilterWhere(['like', 'mobile_customer', $this->mobile_customer])
            ->andFilterWhere(['like', 'email_customer', $this->email_customer])
            ->andFilterWhere(['like', 'comment_customer', $this->comment_customer]);

        return $dataProvider;
    }
}
