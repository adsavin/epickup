<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShopBranchHasProduct;

/**
 * app\models\ShopBranchHasProductSearch represents the model behind the search form about `app\models\ShopBranchHasProduct`.
 */
 class ShopBranchHasProductSearch extends ShopBranchHasProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_branch_id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['start_date', 'end_date'], 'safe'],
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
        $query = ShopBranchHasProduct::find();

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
            'shop_branch_id' => $this->shop_branch_id,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        return $dataProvider;
    }
}
