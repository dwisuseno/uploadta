<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\AnalysisOfWork;

/**
 * app\modules\hrm\models\AnalysisOfWorkSearch represents the model behind the search form about `app\modules\hrm\models\AnalysisOfWork`.
 */
 class AnalysisOfWorkSearch extends AnalysisOfWork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'sub_skill_id'], 'integer'],
            [['count', 'late_time', 'on_time', 'wage', 'on_time_bonus', 'total_work_time', 'total_late_time', 'total_on_time', 'total_wage', 'total_loss', 'total_on_time_bonus', 'variance'], 'number'],
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
        $query = AnalysisOfWork::find();

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
            'sub_skill_id' => $this->sub_skill_id,
            'count' => $this->count,
            'late_time' => $this->late_time,
            'on_time' => $this->on_time,
            'wage' => $this->wage,
            'on_time_bonus' => $this->on_time_bonus,
            'total_work_time' => $this->total_work_time,
            'total_late_time' => $this->total_late_time,
            'total_on_time' => $this->total_on_time,
            'total_wage' => $this->total_wage,
            'total_loss' => $this->total_loss,
            'total_on_time_bonus' => $this->total_on_time_bonus,
            'variance' => $this->variance,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
