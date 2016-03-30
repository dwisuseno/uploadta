<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hrm\models\MasterPersonnelSubArea;

/**
 * app\modules\hrm\models\MasterPersonnelSubAreaSearch represents the model behind the search form about `app\modules\hrm\models\MasterPersonnelSubArea`.
 */
 class MasterPersonnelSubAreaSearch extends MasterPersonnelSubArea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personnel_area_id'], 'integer'],
            [['personnel_subarea_code', 'personnel_subarea_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = MasterPersonnelSubArea::find();

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
            'personnel_area_id' => $this->personnel_area_id,
        ]);

        $query->andFilterWhere(['like', 'personnel_subarea_code', $this->personnel_subarea_code])
            ->andFilterWhere(['like', 'personnel_subarea_name', $this->personnel_subarea_name])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
