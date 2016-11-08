<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BlogPost;

/**
 * BlogPostSearch represents the model behind the search form about `frontend\models\BlogPost`.
 */
class BlogPostSearch extends BlogPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catalog_id', 'click', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'brief', 'content', 'tags', 'surname', 'banner'], 'safe'],
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
        $query = BlogPost::find();

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
            'catalog_id' => $this->catalog_id,
            'click' => $this->click,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'banner', $this->banner]);

        return $dataProvider;
    }
}
