<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdShipinventory;

/**
 * app\modules\sd\models\SdShipinventorySearch represents the model behind the search form about `app\modules\sd\models\SdShipinventory`.
 */
 class SdShipinventorySearch extends SdShipinventory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cap_shipinventory'], 'integer'],
            [['code_shipinventory', 'name_shipinventory', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdShipinventory::find();

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
            'cap_shipinventory' => $this->cap_shipinventory,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_shipinventory', $this->code_shipinventory])
            ->andFilterWhere(['like', 'name_shipinventory', $this->name_shipinventory]);

        return $dataProvider;
    }
}
