<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\EmployeeGroup;

/**
 * app\modules\hrm\models\EmployeeGroupSearch represents the model behind the search form about `app\modules\hrm\models\EmployeeGroup`.
 */
 class EmployeeGroupSearch extends EmployeeGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'positions_id'], 'integer'],
            [['employeegroup_code', 'employeegroup_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = EmployeeGroup::find();

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
            'positions_id' => $this->positions_id,
        ]);

        $query->andFilterWhere(['like', 'employeegroup_code', $this->employeegroup_code])
            ->andFilterWhere(['like', 'employeegroup_name', $this->employeegroup_name])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
