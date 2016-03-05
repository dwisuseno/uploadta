<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\KeyResultArea;

/**
 * app\modules\hrm\models\KeyResultAreaSearch represents the model behind the search form about `app\modules\hrm\models\KeyResultArea`.
 */
 class KeyResultAreaSearch extends KeyResultArea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sasaran_strategis_id'], 'integer'],
            [['key_result_area', 'created_at', 'updated_at'], 'safe'],
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
        $query = KeyResultArea::find();

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
            'sasaran_strategis_id' => $this->sasaran_strategis_id,
        ]);

        $query->andFilterWhere(['like', 'key_result_area', $this->key_result_area])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
