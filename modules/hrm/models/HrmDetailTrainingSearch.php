<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrmDetailTraining;

/**
 * app\modules\hrm\models\HrmDetailTrainingSearch represents the model behind the search form about `app\modules\hrm\models\HrmDetailTraining`.
 */
 class HrmDetailTrainingSearch extends HrmDetailTraining
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hrm_training_id', 'hrm_employee_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = HrmDetailTraining::find();

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
            'hrm_training_id' => $this->hrm_training_id,
            'hrm_employee_id' => $this->hrm_employee_id,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
