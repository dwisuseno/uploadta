<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrmJobRequisition;

/**
 * app\modules\hrm\models\HrmJobRequisitionSearch represents the model behind the search form about `app\modules\hrm\models\HrmJobRequisition`.
 */
 class HrmJobRequisitionSearch extends HrmJobRequisition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hrm_position_id'], 'integer'],
            [['job_requisition_code', 'job_requisition_name', 'requirement', 'created_at', 'updated_at'], 'safe'],
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
        $query = HrmJobRequisition::find();

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
            'hrm_position_id' => $this->hrm_position_id,
        ]);

        $query->andFilterWhere(['like', 'job_requisition_code', $this->job_requisition_code])
            ->andFilterWhere(['like', 'job_requisition_name', $this->job_requisition_name])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
