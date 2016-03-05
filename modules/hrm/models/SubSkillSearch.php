<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\SubSkill;

/**
 * app\modules\hrm\models\SubSkillSearch represents the model behind the search form about `app\modules\hrm\models\SubSkill`.
 */
 class SubSkillSearch extends SubSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skill_id', 'level', 'equal_to', 'equal_time'], 'integer'],
            [['sub_skill_code', 'created_at', 'updated_at'], 'safe'],
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
        $query = SubSkill::find();

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
            'skill_id' => $this->skill_id,
            'level' => $this->level,
            'equal_to' => $this->equal_to,
            'equal_time' => $this->equal_time,
        ]);

        $query->andFilterWhere(['like', 'sub_skill_code', $this->sub_skill_code])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
