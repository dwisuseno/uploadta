<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personnelstructure;

/**
 * app\models\PersonnelstructureSearch represents the model behind the search form about `app\models\Personnelstructure`.
 */
 class PersonnelstructureSearch extends Personnelstructure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'positions_id', 'employeegroup_id', 'employeesubgroup_id'], 'integer'],
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
        $query = Personnelstructure::find();

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
            'employeegroup_id' => $this->employeegroup_id,
            'employeesubgroup_id' => $this->employeesubgroup_id,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
