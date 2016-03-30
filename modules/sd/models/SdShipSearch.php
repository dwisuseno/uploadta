<?php

namespace app\modules\sd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sd\models\SdShip;

/**
 * app\modules\sd\models\SdShipSearch represents the model behind the search form about `app\modules\sd\models\SdShip`.
 */
 class SdShipSearch extends SdShip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cost_ship', 'worktime_ship', 'loadtime_ship', 'pciktime_ship', 'currency_id'], 'integer'],
            [['code_ship', 'desc_ship', 'startday_ship', 'endday_ship', 'created_at', 'updated_at'], 'safe'],
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
        $query = SdShip::find();

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
            'cost_ship' => $this->cost_ship,
            'worktime_ship' => $this->worktime_ship, 
            'loadtime_ship' => $this->loadtime_ship, 
            'pciktime_ship' => $this->pciktime_ship, 
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'currency_id' => $this->currency_id,
        ]);

        $query->andFilterWhere(['like', 'code_ship', $this->code_ship])
            ->andFilterWhere(['like', 'desc_ship', $this->desc_ship])
            ->andFilterWhere(['like', 'startday_ship', $this->startday_ship])
            ->andFilterWhere(['like', 'endday_ship', $this->endday_ship]);

        return $dataProvider;
    }
}
