<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrmPayroll;

/**
 * app\modules\hrm\models\HrmPayrollSearch represents the model behind the search form about `app\modules\hrm\models\HrmPayroll`.
 */
 class HrmPayrollSearch extends HrmPayroll
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'salary_amount'], 'integer'],
            [['payroll_code', 'date', 'payroll_status', 'created_at', 'updated_at'], 'safe'],
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
        $query = HrmPayroll::find();

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
            'employee_id' => $this->employee_id,
            'salary_amount' => $this->salary_amount,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'payroll_code', $this->payroll_code])
            ->andFilterWhere(['like', 'payroll_status', $this->payroll_status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
