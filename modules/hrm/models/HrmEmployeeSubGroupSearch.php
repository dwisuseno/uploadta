<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrmEmployeeSubGroup;

/**
 * app\modules\hrm\models\HrmEmployeeSubGroupSearch represents the model behind the search form about `app\modules\hrm\models\HrmEmployeeSubGroup`.
 */
 class HrmEmployeeSubGroupSearch extends HrmEmployeeSubGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_group_id'], 'integer'],
            [['employeesubgroup_code', 'employeesubgroup_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = HrmEmployeeSubGroup::find();

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
            'employee_group_id' => $this->employee_group_id,
        ]);

        $query->andFilterWhere(['like', 'employeesubgroup_code', $this->employeesubgroup_code])
            ->andFilterWhere(['like', 'employeesubgroup_name', $this->employeesubgroup_name])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
