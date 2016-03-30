<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdSalesarea;

/**
 * app\modules\sd\models\SdSalesareaSearch represents the model behind the search form about `app\modules\sd\models\SdSalesarea`.
 */
 class SdSalesareaSearch extends SdSalesarea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sd_salesorg_id', 'sd_division_id', 'sd_dchl_id', 'company_id'], 'integer'],
            [['code_salesarea', 'status_salesarea', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdSalesarea::find();

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
            'sd_salesorg_id' => $this->sd_salesorg_id,
            'sd_division_id' => $this->sd_division_id,
            'sd_dchl_id' => $this->sd_dchl_id,
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_salesarea', $this->code_salesarea])
            ->andFilterWhere(['like', 'status_salesarea', $this->status_salesarea]);

        return $dataProvider;
    }
}
