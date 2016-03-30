<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdCp;

/**
 * app\modules\sd\models\SdCpSearch represents the model behind the search form about `app\modules\sd\models\SdCp`.
 */
 class SdCpSearch extends SdCp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code_cp', 'title_cp', 'firstname_cp', 'middlename_cp', 'lastname_cp', 'email_cp', 'telp_cp', 'telpext_cp', 'mobile_cp', 'department_cp', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdCp::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_cp', $this->code_cp])
            ->andFilterWhere(['like', 'title_cp', $this->title_cp])
            ->andFilterWhere(['like', 'firstname_cp', $this->firstname_cp])
            ->andFilterWhere(['like', 'middlename_cp', $this->middlename_cp])
            ->andFilterWhere(['like', 'lastname_cp', $this->lastname_cp])
            ->andFilterWhere(['like', 'email_cp', $this->email_cp])
            ->andFilterWhere(['like', 'telp_cp', $this->telp_cp])
            ->andFilterWhere(['like', 'telpext_cp', $this->telpext_cp])
            ->andFilterWhere(['like', 'mobile_cp', $this->mobile_cp])
            ->andFilterWhere(['like', 'department_cp', $this->department_cp]);

        return $dataProvider;
    }
}
