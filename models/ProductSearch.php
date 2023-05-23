<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */

 
class ProductSearch extends Product
{
    public $min_price; //добавляем для поиска по цене
    public $max_price;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'floor_id', 'size_id', 'color_id', 'counts', 'min_price', 'max_price'], 'integer'],
            [['name', 'image_one', 'image_two', 'image_three', 'description', 'created_at'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return \yii\base\Model::scenarios();
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
        $query = Product::find();

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
            'category_id' => $this->category_id,
            'floor_id' => $this->floor_id,
            'price' => $this->price,
            'size_id' => $this->size_id,
            'color_id' => $this->color_id,
            'counts' => $this->counts,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image_one', $this->image_one])
            ->andFilterWhere(['like', 'image_two', $this->image_two])
            ->andFilterWhere(['like', 'image_three', $this->image_three])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere([            
                'and',            
                ['>=','price', $this->min_price],            
                ['<=','price', $this->max_price],        
            ]);

        return $dataProvider;
    }
}
