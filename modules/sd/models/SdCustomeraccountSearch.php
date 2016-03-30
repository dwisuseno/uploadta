<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdCustomeraccount;

/**
 * app\modules\sd\models\SdCustomeraccountSearch represents the model behind the search form about `app\modules\sd\models\SdCustomeraccount`.
 */
 class SdCustomeraccountSearch extends SdCustomeraccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gl_bank_id', 'sd_customer_id'], 'integer'],
            [['city_bank', 'country_bank', 'key_bank', 'account_bank', 'holder_customeraccount'], 'safe'],
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
        $query = SdCustomeraccount::find();

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
            'gl_bank_id' => $this->gl_bank_id,
            'sd_customer_id' => $this->sd_customer_id,
        ]);

        $query->andFilterWhere(['like', 'city_bank', $this->city_bank])
            ->andFilterWhere(['like', 'country_bank', $this->country_bank])
            ->andFilterWhere(['like', 'key_bank', $this->key_bank])
            ->andFilterWhere(['like', 'account_bank', $this->account_bank])
            ->andFilterWhere(['like', 'holder_customeraccount', $this->holder_customeraccount]);

        return $dataProvider;
    }
}
