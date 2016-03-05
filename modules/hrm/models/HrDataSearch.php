<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrData;

/**
 * app\modules\hrm\models\HrDataSearch represents the model behind the search form about `app\modules\hrm\models\HrData`.
 */
 class HrDataSearch extends HrData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bank_account_id', 'children', 'employee_id'], 'integer'],
            [['personnelnumber', 'date_of_birth', 'language', 'nationality', 'marital_status', 'valid_from', 'valid_to', 'created_at', 'updated_at'], 'safe'],
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
        $query = HrData::find();

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
            'bank_account_id' => $this->bank_account_id,
            'date_of_birth' => $this->date_of_birth,
            'children' => $this->children,
            'employee_id' => $this->employee_id,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
        ]);

        $query->andFilterWhere(['like', 'personnelnumber', $this->personnelnumber])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
