<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Additive;

/**
 * AddtitiveSearch represents the model behind the search form of `app\models\Additive`.
 */
class AddtitiveSearch extends Additive
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'in_russia', 'in_eu', 'seq', 'order_number', 'updater_id', 'creator_id'], 'integer'],
            [['code', 'spec', 'functions', 'appearance', 'negative_effects', 'information', 'employment', 'extracted_from', 'update_time', 'create_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Additive::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'in_russia' => $this->in_russia,
            'in_eu' => $this->in_eu,
            'seq' => $this->seq,
            'order_number' => $this->order_number,
            'updater_id' => $this->updater_id,
            'update_time' => $this->update_time,
            'creator_id' => $this->creator_id,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'spec', $this->spec])
            ->andFilterWhere(['like', 'functions', $this->functions])
            ->andFilterWhere(['like', 'appearance', $this->appearance])
            ->andFilterWhere(['like', 'negative_effects', $this->negative_effects])
            ->andFilterWhere(['like', 'information', $this->information])
            ->andFilterWhere(['like', 'employment', $this->employment])
            ->andFilterWhere(['like', 'extracted_from', $this->extracted_from]);

        return $dataProvider;
    }
}
