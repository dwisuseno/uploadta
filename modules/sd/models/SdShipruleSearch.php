<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdShiprule;

/**
 * app\modules\sd\models\SdShipruleSearch represents the model behind the search form about `app\modules\sd\models\SdShiprule`.
 */
 class SdShipruleSearch extends SdShiprule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'value_shiprule', 'sd_shipcondition_id', 'uom_id'], 'integer'],
            [['rule_shiprule', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdShiprule::find();

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
            'value_shiprule' => $this->value_shiprule,
            'sd_shipcondition_id' => $this->sd_shipcondition_id,
            'uom_id' => $this->uom_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'rule_shiprule', $this->rule_shiprule]);

        return $dataProvider;
    }
}
