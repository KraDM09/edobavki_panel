<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'updater_id', 'creator_id'], 'integer'],
            [['spec', 'announcement', 'content', 'thumb_name', 'update_time', 'create_time'], 'safe'],
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
        $query = Article::find();

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
            'updater_id' => $this->updater_id,
            'update_time' => $this->update_time,
            'creator_id' => $this->creator_id,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'spec', $this->spec])
            ->andFilterWhere(['like', 'announcement', $this->announcement])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'thumb_name', $this->thumb_name]);

        return $dataProvider;
    }
}
