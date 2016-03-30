<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\HrmSkill;

/**
 * app\modules\hrm\models\HrmSkillSearch represents the model behind the search form about `app\modules\hrm\models\HrmSkill`.
 */
 class HrmSkillSearch extends HrmSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level_id'], 'integer'],
            [['skill_code', 'detail_skill', 'created_at', 'updated_at'], 'safe'],
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
        $query = HrmSkill::find();

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
            'level_id' => $this->level_id,
        ]);

        $query->andFilterWhere(['like', 'skill_code', $this->skill_code])
            ->andFilterWhere(['like', 'detail_skill', $this->detail_skill])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
