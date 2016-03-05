<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\Employee;

/**
 * app\modules\hrm\models\EmployeeSearch represents the model behind the search form about `app\modules\hrm\models\Employee`.
 */
 class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personnel_sub_area_id', 'bank_account_id'], 'integer'],
            [['person_id', 'title', 'first_name', 'middle_name', 'last_name', 'address', 'photo', 'nickname', 'start_work', 'last_education', 'gender', 'to_work', 'status', 'personnel_number', 'date_of_birth', 'language', 'nationality', 'marital_status', 'bank_account_own', 'bank_account_number', 'type', 'password', 'created_at', 'updated_at'], 'safe'],
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
        $query = Employee::find();

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
            'personnel_sub_area_id' => $this->personnel_sub_area_id,
            'start_work' => $this->start_work,
            'to_work' => $this->to_work,
            'date_of_birth' => $this->date_of_birth,
            'bank_account_id' => $this->bank_account_id,
        ]);

        $query->andFilterWhere(['like', 'person_id', $this->person_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'last_education', $this->last_education])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'personnel_number', $this->personnel_number])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'bank_account_own', $this->bank_account_own])
            ->andFilterWhere(['like', 'bank_account_number', $this->bank_account_number])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
